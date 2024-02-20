<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use App\Models\Project;
use Illuminate\Http\Request;
use Auth;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function show(Applicants $applicants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicants $applicants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicants $applicants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicants $applicants)
    {
        //
    }

    public function applicant_list($id){
        $applicants = Applicants::where('project_id', $id)
                       ->with('user')
                       ->orderBy('created_at', 'desc')
                       ->get();

        $project = Project::where('id',$id)->where('active', 1)->firstOrFail();


        return view('jobs.applicants', compact('applicants'));
    }

    public function view_applicant($id)
    {
        $applicant = Applicants::where('id',$id)->firstOrFail();
        $project = Project::where('id',$applicant->project_id)->where('active', 1)->firstOrFail();
        return view('jobs.view_applicant',compact('applicant','project'));
    }

    public function applicant_add(Request $request){
        $portfolio = "";
        if ($request->hasFile('portfolio')) {
            $data = $request->input('portfolio');
            $portfolio = $request->file('portfolio')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('portfolio')->move($destination, $portfolio);
        }

        $applicant  = Applicants::where('user_id', Auth::user()->id)->first();

        if (empty($applicant)) {
            $add_applicants = Applicants::create([
                'user_id'       => Auth::user()->id,
                'duration'      => $request->duration,
                'cover_letter'  => $request->cover_letter,
                'project_id'    => $request->project_id,
                'experience'    => $request->experience,
                'cost'          => $request->cost,
                'portfolio'     => $portfolio
            ]);
        }else{
            return back()->with('error', 'You have already applied for this job');
        }

        return back()->with('success', 'Proposal submitted successfully');
    }
}
