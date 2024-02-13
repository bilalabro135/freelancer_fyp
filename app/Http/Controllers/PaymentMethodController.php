<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use DataTables;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:payment-methods-list', ['only' => ['index','show']]);
         $this->middleware('permission:payment-methods-create', ['only' => ['create','store']]);
         $this->middleware('permission:payment-methods-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:payment-methods-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('payment_method.index');
    }

    public function list(){
        $data   = paymentMethod::orderBy('payment_methods.method_title')
                    ->select(
                                'payment_methods.id',
                                'payment_methods.method_title',
                                'payment_methods.active'
                            )
                    ->get();

        foreach ($data as $key => $value) {
            if ($value->active == 1) {
                $value->active = "".'<span class="badge badge-success">Active</span>'."";
            }else{
                $value->active = "".'<span class="badge badge-danger">Inactive</span>'."";
            }
        }

        return 
            DataTables::of($data)
                ->addColumn('action',function($data){
                    return '
                    <div class="btn-group btn-group">
                        <a class="btn btn-info btn-xs" href="payment-methods/'.$data->id.'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-xs" href="payment-methods/'.$data->id.'/edit" id="'.$data->id.'">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-xs delete_all"
                            data-url="'. url('del_payment_method') .'" data-id="'.$data->id.'">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>';
                })
                ->addColumn('srno','')
                ->rawColumns(['srno','','action','active'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_method = PaymentMethod::where('method_title',$request->method_title)->first();

        if ($check_method) {
            return response()->json(['error'=>$request->method_title.' payment method already exists']);
        }

        // $service_image = "";
        // if ($request->hasFile('service_image')) {
        //     $data = $request->input('service_image');
        //     $service_image = $request->file('service_image')->getClientOriginalName();
        //     $destination = base_path() . '/public/uploads';
        //     $request->file('service_image')->move($destination, $service_image);
        // }

        $data   = PaymentMethod::create([
            'method_title' => $request->method_title,
            'description' => $request->description,
        ]);

        if ($data) {
            return response()->json(['success'=>$request['method_title']. ' added successfully.']);
        }else{
            return response()->json(['error'=>'Failed to add Payment method']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $payment_method = PaymentMethod::where('id',$paymentMethod->id)->first();
        return view('payment_method.show',compact('payment_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $payment_method = PaymentMethod::where('id',$paymentMethod->id)->first();
        return view('payment_method.edit',compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $payment_method = PaymentMethod::where('id',$paymentMethod->id)->first();
        $payment_method->method_title = $request->method_title;
        $payment_method->description = $request->description;
        $payment_method->save();

        return response()->json(['success'=>'Method '.$payment_method['method_title']. ' updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data   = PaymentMethod::where('id',explode(",", $request->ids))->delete();
        if ($data) {
            return response()->json(['success'=>" Record deleted successfully."]);
        }
    }
}
