<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\PaymentMethod;
use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use App\Models\AccountBook;
use App\Models\Applicants;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use DataTables;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:job-list', ['only' => ['index','show']]);
         $this->middleware('permission:job-create', ['only' => ['create','store']]);
         $this->middleware('permission:job-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:job-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(Auth::user()->roles[0]->id == 1){
            $projects = Project::with('applicants')->where('active',1)->get();
        }else{
            $projects = Project::with('applicants')->where('active',1)->where('user_id', Auth::user()->id)->get();
        }

        return view('jobs.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $payment_method = PaymentMethod::pluck('method_title','id');
        $categories     = Category::pluck('name','id');
        $roles          = Role::where('id','<>',1)->where('name','<>','user')->pluck('name','id');
        return view('jobs.create',compact('payment_method','categories','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $validated = $request->validated();
        $job_image = "";

        if ($request->hasFile('job_image') != null) {
            if ($request->hasFile('job_image')) {
                $data = $request->input('job_image');
                $job_image = $request->file('job_image')->getClientOriginalName();
                $destination = base_path() . '/public/uploads';
                $request->file('job_image')->move($destination, $job_image);
            }
        }

        $project_file = "";

        if ($request->hasFile('project_file') != null) {
            if ($request->hasFile('project_file')) {
                $data = $request->input('project_file');
                $project_file = $request->file('project_file')->getClientOriginalName();
                $destination = base_path() . '/public/uploads';
                $request->file('project_file')->move($destination, $project_file);
            }
        }


        $data   = Project::create([
            'job_title'     => $request->job_title,
            'location'      => $request->location,
            'delivery_time' => $request->delivery_time,
            'payment_method'=> $request->payment_method,
            'price'         => $request->price,
            'role_id'       => $request->role_id,
            'job_category'  => $request->job_category,
            'job_image'     => $job_image,
            'project_file'  => $project_file,
            'description'   => $request->description,
            'user_id'       => Auth::user()->id
        ]);

        if ($data) {
            return response()->json(['success'=>$request['job_title']. ' added successfully.']);
        }else{
            return response()->json(['error'=>'Failed to add Payment method']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Auth::user()->roles[0]->id == 1){
        //     $project = Project::where('active',1)->first();
        // }elseif(Auth::user()->roles[0]->id == 4){
        //     $project = Project::where('active',1)->where('role_id', 4)->first();
        // }else{
        //     $project = Project::where('active',1)->where('role_id', Auth::user()->roles[0]->id)->first();
        // }

        $project = Project::where('active',1)->where('id',$id)->firstOrFail();
        $applicants     = Applicants::where('project_id',$id)->count();
        
        $job_category   = Category::where('id',$project->job_category)->firstOrFail();
        
        $payment_method = PaymentMethod::where('id',$project->payment_method)->first();
        
        $project->job_category = $job_category;
        $project->payment_method = $payment_method;
        return view('jobs.show',compact('project','applicants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::where('id',$id)->where('user_id', Auth::user()->id)->where('active',1)->firstOrFail();
        $job_category = Category::where('id',$project->job_category)->first();
        $payment_method = PaymentMethod::where('id',$project->payment_method)->first();
        $payment_method = PaymentMethod::pluck('method_title','id');
        $categories = Category::pluck('name','id');
        $project->job_category = $job_category;
        $project->payment_method = $payment_method;
        return view('jobs.edit',compact('project','payment_method','categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreJobRequest $request, Project $project)
    {
        $validated = $request->validated();
        $job_image = "";
        if ($request->hasFile('job_image')) {
            $data = $request->input('job_image');
            $job_image = $request->file('job_image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('job_image')->move($destination, $job_image);
        }

        $project_file = "";
        if ($request->hasFile('project_file')) {
            $data = $request->input('project_file');
            $project_file = $request->file('project_file')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('project_file')->move($destination, $project_file);
        }


        $project = Project::where('id',$request->project_id)->where('user_id', Auth::user()->id)->first();
        if (!empty($project)) {
            $project->job_title     = $request->job_title;
            $project->delivery_time = $request->delivery_time;
            $project->price         = $request->price;
            $project->job_category  = $request->job_category;
            $project->location      = $request->location;
            $project->payment_method= $request->payment_method;
            $project->job_image     = $job_image ? $job_image : $project->job_image;
            $project->project_file  = $project_file ? $project_file : $project->project_file;
            $project->description   = $request->description;
            $project->save();
            return response()->json(['success'=>$request['job_title']. ' updated successfully.']);
        }else{
            return response()->json(['error'=>'Failed to update project']);
        }
    }

    public function request_completion(Request $request)
    {

        $project = Project::where('id',$request->project_id)->first();
        
        if ($project) {

            Message::create([
                'from_user_id'  => Auth::user()->id,
                'to_user_id'    => $request->user_id,
                'message'       => "<i>Greetings, I wanted to commit that your given task has been completed please provide me the amount of the project and close this project.</i>",
                'project_name'  => $project->job_title
            ]);
        }
        return redirect()->route('chat',['user_id' => $request->user_id]);

    }


    public function payment_completion(Request $request)
    {

        $project = Project::where('id',$request->project_id)->first();
        
        if ($project) {
            $user = User::where('id',$request->user_id)->first();

            $number_price = str_replace(",", "", $request->price);
            $user->balance = ((int)$number_price + (int)$user->balance);
            $user->save();

            if ($user) {
                $project->active = 0;
                $project->save();

                Message::create([
                    'from_user_id'  => Auth::user()->id,
                    'to_user_id'    => $request->user_id,
                    'message'       => "<i>Payment has been clear/completed</i>",
                    'project_name'  => $project->job_title
                ]);
            }
        }
        return redirect()->route('chat',['user_id' => $request->user_id]);

    }

    public function hire_person(Request $request){
        $project = Project::where('id',$request->project_id)->where('active', 1)->first();

        if (!($project)) {
            return response()->json(['error'=>'Project already assigned']);
        }

        Message::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $request->user_id,
            'message'   => "You are hired for this job",
            'project_name'   => $project->job_title
        ]);

        $project->active = 2;
        $project->price = $request->cost;
        $project->save();
        return redirect()->route('chat',['user_id' => $request->user_id]);
    }

    public function my_list()
    {
        $user = Auth::user(); 
        $projects = $user->hiredProjects()->get();

        return view('jobs.my_jobs', compact('projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $project = Project::find($id);
        if ($project == null) {
            return back()->with('error', 'Projects cannot be found.');
        }

        $project->delete();

        return redirect()->route('jobs.index')->with('success', 'Project(s) deleted successfully.');
    }
}
