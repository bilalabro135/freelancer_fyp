<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\PaymentMethod;
use App\Models\Category;
use App\Models\Applicants;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
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
        $projects = Project::where('active',1)->where('user_id', Auth::user()->id)->get();
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
        $roles          = Role::where('id','<>',1)->pluck('name','id');
        return view('jobs.create',compact('payment_method','categories','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_image = "";
        if ($request->hasFile('job_image')) {
            $data = $request->input('job_image');
            $job_image = $request->file('job_image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('job_image')->move($destination, $job_image);
        }

        $data   = Project::create([
            'job_title'     => $request->job_title,
            'location'      => $request->location,
            'delivery_time' => $request->delivery_time,
            'payment_method'=> $request->payment_method,
            'price'         => $request->price,
            'job_category'  => $request->job_category,
            'job_image'     => $job_image,
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
        $project        = Project::where('id',$id)->where('user_id', Auth::user()->id)->first();
        
        $applicants     = Applicants::where('project_id',$id)->count();
        
        $job_category   = Category::where('id',$project->job_category)->first();
        
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
        $project = Project::where('id',$id)->where('user_id', Auth::user()->id)->first();
        $job_category = Category::where('id',$project->job_category)->first();
        $payment_method = PaymentMethod::where('id',$project->payment_method)->first();
        $payment_method = PaymentMethod::pluck('method_title','id');
        $categories = Category::pluck('name','id');
        $project->job_category = $job_category;
        $project->payment_method = $payment_method;
        return view('jobs.edit',compact('project','payment_method','categories'));
    }

    public function applicant_list()
    {
        return view('jobs.applicants');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $job_image = "";
        if ($request->hasFile('job_image')) {
            $data = $request->input('job_image');
            $job_image = $request->file('job_image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('job_image')->move($destination, $job_image);
        }

        $project = Project::where('id',$request->project_id)->where('user_id', Auth::user()->id)->first();
        if (!empty($project)) {
            $project->job_title     = $request->job_title;
            $project->delivery_time = $request->delivery_time;
            $project->price         = $request->price;
            $project->location      = $request->location;
            $project->job_image     = $job_image;
            $project->description   = $request->description;
            $project->save();
            return response()->json(['success'=>$request['job_title']. ' updated successfully.']);
        }else{
            return response()->json(['error'=>'Failed to update project']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data   = Project::where('id',explode(",", $request->ids))->delete();
        if ($data) {
            return response()->json(['project'=>'Project deleted successfully.']);
        }
    }
}
