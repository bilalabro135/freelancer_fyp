<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $date               = date("Y-m-d");

        // $students = Student::where('deleted_at',null)->get();
        // $input      = $students->all();
        // $students_count = count($input);

        // $fee_sum = PaidReciet::where('student_id','<>',null)->sum('amount');

        // $rec['oSell']       = DB::table('customer_has_transactions')
        //                         ->whereDate('customer_has_transactions.created_at','<', $date)
        //                         ->sum('debit');

        // $rec['cSell']       = DB::table('customer_has_transactions')
        //                         ->whereDate('customer_has_transactions.created_at', $date)
        //                         ->sum('debit');

        // $rec['oPurchase']   = DB::table('company_has_transactions')
        //                         ->whereDate('company_has_transactions.created_at','<', $date)
        //                         ->sum('debit');

        // $rec['cPurchase']   = DB::table('company_has_transactions')
        //                         ->whereDate('company_has_transactions.created_at', $date)
        //                         ->sum('debit');

        return view('home');

        // return view('home');
    }
}