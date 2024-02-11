<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:testimonials-list', ['only' => ['index','show']]);
         $this->middleware('permission:testimonials-create', ['only' => ['create','store']]);
         $this->middleware('permission:testimonials-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testimonials-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $testimonial = Testimonial::where('active', 1)->get();
        return view('testimonials.index', compact('testimonial'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = Testimonial::create([
            'name'          => $request->name,
            'brand'         => $request->brand,
            'description'   => $request->description
        ]);

        if ($testimonial) {
            return response()->json(['success'=> $testimonial['name']."'".'s testimony added successfully.']);
        }else{
            return response()->json(['error'=>'Failed to add testimonial']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        $testimonial = Testimonial::where('id',$testimonial->id)->first();
        return view('testimonials.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $testimonial = Testimonial::where('id',$testimonial->id)->first();
        return view('testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial = Testimonial::where('id',$testimonial->id)->first();
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->save();

        return response()->json(['success'=>$testimonial['name']."'".'s testimony updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data   = Testimonial::where('id',explode(",", $request->ids))->delete();
        if ($data) {
            return response()->json(['success'=>" Record deleted successfully."]);
        }
    }
}
