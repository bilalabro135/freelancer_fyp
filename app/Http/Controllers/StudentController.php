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
        if ($request->hasFile('student_pic')) {
            $data = $request->input('student_pic');
            $photo = $request->file('student_pic')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('student_pic')->move($destination, $photo);
        }
        // Retrieve the validated input data...
        $validated    = $request->validated();

        // store validated data
        $data         = Student::create($request->all());
        $data_update  = Student::where('name',$request['name'])->first();
        $data_update->student_pic = $photo;
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
        if ($request->hasFile('student_pic')) {
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
        $data_update->student_pic = $photo;
        $data_update->save();
        return response()->json(['success'=>$request['name']. ' updated successfully.']);
    }

    public function destroy(Request $request)
    {
        $data   = Student::whereIn('id',explode(",", $request->ids))->delete();
        return response()->json(['success'=>$data." rating deleted successfully."]);
    }

}
