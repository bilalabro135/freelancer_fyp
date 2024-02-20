<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Applicants;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ChatController extends Controller
{

    public function index() {
        // Subquery to find the latest message time in each conversation
        $latestMessagesSubquery = DB::table('messages')
            ->select(DB::raw('MAX(id) as max_id'), 
                     DB::raw('LEAST(from_user_id, to_user_id) as user_a'), 
                     DB::raw('GREATEST(from_user_id, to_user_id) as user_b'))
            ->where('to_user_id', Auth::id())
            ->orWhere('from_user_id', Auth::id())
            ->groupBy('user_a', 'user_b');

        $chats = DB::table('messages as m')
            ->joinSub($latestMessagesSubquery, 'latest_messages', function ($join) {
                $join->on('m.id', '=', 'latest_messages.max_id');
            })
            ->join('users as u', 'u.id', '=', DB::raw('CASE WHEN m.from_user_id = '.Auth::id().' THEN m.to_user_id ELSE m.from_user_id END'))
            ->select('m.*', 'u.name as sender_name', 'u.email as sender_email', 'u.profile_pic as sender_image')
            ->orderBy('m.id', 'desc')
            ->get();



        return view('chats.index', compact('chats'));
    }


    public function sendMessage(Request $request)
    {
        $data = $request->only('to_user_id', 'message');
        $data['from_user_id'] = Auth::id();

        $filePaths = [];
        if ($request->hasFile('file_path')) {
            $files = $request->file('file_path');
            foreach ($files as $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $destinationPath = public_path('/uploads');
                $file->move($destinationPath, $fileName);
                $filePaths[] = "uploads/" . $fileName;
            }
        }

        if (!empty($filePaths)) {
            $data['file_path'] = json_encode($filePaths);
        }

        try {
            $message = Message::create($data);
            return response()->json($message);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Message could not be sent.'], 500);
        }
    }



    public function fetchMessages($userId)
    {
        $from_user_id = Auth::id();
        $to_user_id = $userId;

        // Retrieve messages between users
        $messages = Message::where(function($query) use ($from_user_id, $to_user_id) {
                            $query->where('from_user_id', $from_user_id)->where('to_user_id', $to_user_id);
                        })
                        ->orWhere(function($query) use ($from_user_id, $to_user_id) {
                            $query->where('from_user_id', $to_user_id)->where('to_user_id', $from_user_id);
                        })
                        ->with('sender') // Eager load the sender relationship
                        ->get()
                        ->map(function ($message) {
                            $now = \Carbon\Carbon::now();
                            $diff = $message->created_at->diffInMinutes($now);
                            return [
                                'id' => $message->id,
                                'from_user_id' => $message->from_user_id,
                                'to_user_id' => $message->to_user_id,
                                'project_name' => $message->project_name,
                                'message' => $message->message,
                                'file_path' => $message->file_path,
                                'created_at' => $diff < 1 ? 'Just now' : $message->created_at->diffForHumans(),
                                'sender_name' => optional($message->sender)->name, // Use optional to avoid null errors
                            ];
                        });


        return response()->json($messages);
    }


    public function chatStart($user_id){
        $user       = User::findorFail($user_id);
        if (Auth::user()->roles[0]->id == 4) {
            $applicant  = Applicants::where('user_id',$user->id)->first();
            $project    = Project::where('id',$applicant->project_id)->firstOrFail();
            return view('chat',compact('user','applicant','project'));
        }else{
            return view('chat',compact('user'));
        }
    }


}
