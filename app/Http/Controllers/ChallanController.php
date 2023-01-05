<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\TotalFee;
use DB;
use date;
use DataTables;
use App\Models\Student;
use App\Models\PaidReciet;
use App\Http\Requests\ChallanRequest;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:challan-list', ['only' => ['index','show']]);
         $this->middleware('permission:challan-create', ['only' => ['create','store']]);
         $this->middleware('permission:challan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:challan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('challan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::pluck('name','id');
        return view('challan.create',compact('students'));
    }

    public function list(){
        $data   = DB::table('students')
                    ->select('students.name','students.student_fee','students.admission_date','challans.id','challans.created_at')
                    ->leftJoin('challans', 'challans.student_id', '=', 'students.id')
                    ->where('challans.deleted_at','=',null)
                    ->whereNotNull('challans.id')
                    ->get();
        foreach ($data as $key => $value) {
            if ($value->admission_date) {
                $value->admission_date = date("d M Y",strtotime($value->admission_date));
            }
            if ($value->created_at) {
                $value->created_at = date("d M Y",strtotime($value->created_at));
            }
        }
        return 
            DataTables::of($data)
                ->addColumn('action',function($data){
                    return '
                    <div class="btn-group btn-group">
                        <a class="btn btn-info btn-xs" href="challan/'.$data->id.'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-xs" href="challan/'.$data->id.'/edit" id="'.$data->id.'">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-xs delete_all"
                            data-url="'. url('del_challan') .'" data-id="'.$data->id.'">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>';
                })
                ->addColumn('srno','')
                ->rawColumns(['srno','','action'])
                ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChallanRequest $request)
    {
        $student = Student::where('id',$request->student_id)->first();
        $validated    = $request->validated();

        if ($request->admission_fee == null) {
            $request->admission_fee = 0;
        }
        if ($request->annual_fee == null) {
            $request->annual_fee = 0;
        }
        if ($request->transport_fee == null) {
            $request->transport_fee = 0;
        }
        if ($request->others == null) {
            $request->others = 0;
        }

        $challan_check = Challan::where('student_id',$request->student_id)->first();

        if ($challan_check) {
            return response()->json(['error'=>'Challan already added for '.$student['name']]);
        }

        $sum_fee = ($request->admission_fee + $request->annual_fee + $request->transport_fee + $request->others + $request->monthly_fee);

        $fee_exists = TotalFee::where('student_id',$request->student_id)->first();
        
        if (!empty($fee_exists)) {
            $fee_exists = TotalFee::where('student_id',$request->student_id)->first();
            $fee_exists->total = $fee_exists->total + $sum_fee;
            $fee_exists->save();
        }else{
            $total_fee = TotalFee::create([
                'student_id' => $request->student_id,
                'total'      => $sum_fee
            ]);
        }

        // store validated data
        $data         = Challan::create($request->all());
        return response()->json(['success'=>'Challan for '.$student['name']. ' added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challan  $challan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challan    = Challan::findOrFail($id);
        $challans   = Challan::all();
        $total_fee  = TotalFee::where('student_id',$challan->student_id)->first();
        $data       = Student::where('id', $challan->student_id)->first();

        $reciet     = PaidReciet::where('student_id',$data->id)->latest()->first();
        
        if ($reciet != null){
            if ($reciet->created_at) {
                $reciet_date = date('M-Y',strtotime($reciet->created_at));
                $date_now    = date('M-Y');
                if ($reciet_date == $date_now) {
                    $reciet_final = 1;
                }else{
                    $reciet_final = 0;
                }
            }
        }else{
            $reciet_final = 0;
        }

        return view('challan.show',compact('data','challan','challans','total_fee','reciet_final'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challan  $challan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $challan        = Challan::findOrFail($id);
        $students       = Student::where('id',$id)->first();
        $student_list   = Student::select('name','id')->where('id',$challan->student_id)->first();
        return view('challan.edit',compact('challan','students','student_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challan  $challan
     * @return \Illuminate\Http\Response
     */
    public function update(ChallanRequest $request,$id)
    {
        // get all request
        $data       = Challan::where('id',$request->challan_id)->first();
        $student    = Student::where('id',$data->student_id)->first();
        $input      = $request->all();

        // if active is not set, make it in-active
        if(!(isset($input['active']))){
            $input['active'] = 0;
        }

        // update
        $upd        = $data->update($input);

        return response()->json(['success'=>'Challan for '.$student['name']. ' updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challan  $challan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $challan  = Challan::where('id',$request->ids)->delete();
        return response()->json(['success'=>'Challan deleted successfully.']);
    }

    public function pay_challan(Request $request){
        $validated = $request->validate([
            'student_id'    => 'required',
            'fees_pay'      => 'required'
        ]);

        $student = Student::where('id',$request->student_id)->first();

        $reciet     = PaidReciet::where('student_id',$request->student_id)->latest()->first();

        if ($reciet != null){
            if ($reciet->created_at) {
                $reciet_date = date('M-Y',strtotime($reciet->created_at));
                $date_now    = date('M-Y');
                if ($reciet_date == $date_now) {
                    return response()->json(['error'=>'Challan already paid for '.$student['name']]);
                }else{
                    $pay = PaidReciet::create([
                        'student_id' => $request->student_id,
                        'fees_pay'   => $request->fees_pay
                    ]);
                }
            }
        }else{
            $pay = PaidReciet::create([
                'student_id' => $request->student_id,
                'fees_pay'   => $request->fees_pay
            ]);
        }
        return response()->json(['success'=>'Challan paid for '. $student['name'] .' successfully.']);
    }
}
