<?php
namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:students-list', ['only' => ['index','show']]);
         $this->middleware('permission:students-create', ['only' => ['create','store']]);
         $this->middleware('permission:students-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:students-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return view('students.index');
    }

    public function list()
    {
        $data   = Student::orderBy('students.name')
                    ->select(
                                'students.id',
                                'students.name',
                                'students.active'
                            )
                    ->get();
        return 
            DataTables::of($data)
                ->addColumn('action',function($data){
                    return '
                    <div class="btn-group btn-group">
                        <a class="btn btn-info btn-xs" href="students/'.$data->id.'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-xs" href="students/'.$data->id.'/edit" id="'.$data->id.'">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-xs delete_all"
                            data-url="'. url('del_rating') .'" data-id="'.$data->id.'">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>';
                })
                ->addColumn('srno','')
                ->rawColumns(['srno','','action'])
                ->make(true);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        // Student Pic
        if ($request->hasFile('student_pic')) {
            $data = $request->input('student_pic');
            $student_pic = $request->file('student_pic')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('student_pic')->move($destination, $student_pic);
        }
        // Recent Student photograhs
        if ($request->hasFile('recent_photograph')) {
            $data = $request->input('recent_photograph');
            $recent_photograph = $request->file('recent_photograph')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('recent_photograph')->move($destination, $recent_photograph);
        }
        // Birth certificate
        if ($request->hasFile('birth_certificate')) {
            $data = $request->input('birth_certificate');
            $birth_certificate = $request->file('birth_certificate')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('birth_certificate')->move($destination, $birth_certificate);
        }
        // Leave certificate
        if ($request->hasFile('leave_certificate')) {
            $data = $request->input('leave_certificate');
            $leave_certificate = $request->file('leave_certificate')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('leave_certificate')->move($destination, $leave_certificate);
        }
        // Father CNIC
        if ($request->hasFile('father_cnic')) {
            $data = $request->input('father_cnic');
            $father_cnic = $request->file('father_cnic')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('father_cnic')->move($destination, $father_cnic);
        }
        // Retrieve the validated input data...
        $validated    = $request->validated();

        // store validated data
        $data         = Student::create($request->all());
        $data_update  = Student::where('name',$request['name'])->first();
        $data_update->student_pic       = $student_pic;
        $data_update->recent_photograph = $recent_photograph;
        $data_update->birth_certificate = $birth_certificate;
        $data_update->leave_certificate = $leave_certificate;
        $data_update->father_cnic       = $father_cnic;
        $data_update->save();
        return response()->json(['success'=>$request['name']. ' added successfully.']);
      
    }

     public function show($id)
    {
        $data         = Student::findorFail($id);
        return view('students.show',compact('data'));
    }


    public function edit($id)
    {
        $data         = Student::findorFail($id);
        return view('students.edit',compact('data'));
    }


    public function update(StudentRequest $request, $id)
    {
        $photo = null;
        if (($request->hasFile('student_pic'))) {
            $data = $request->input('student_pic');
            $photo = $request->file('student_pic')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $photo = $photo;
            $request->file('student_pic')->move($destination, $photo);
        }
        // Retrieve the validated input data...
        $validated  = $request->validated();

        // get all request
        $data       = Student::findOrFail($id);
        $input      = $request->all();

        // if active is not set, make it in-active
        if(!(isset($input['active']))){
            $input['active'] = 0;
        }

        // update
        $upd        = $data->update($input);
        $data_update  = Student::where('id',$id)->first();
        if ($photo != null) {
            $data_update->student_pic = $photo;
        }
        $data_update->save();
        return response()->json(['success'=>$request['name']. ' updated successfully.']);
    }

    public function destroy(Request $request)
    {
        $data   = Student::whereIn('id',explode(",", $request->ids))->delete();
        return response()->json(['success'=>$data." rating deleted successfully."]);
    }

}
