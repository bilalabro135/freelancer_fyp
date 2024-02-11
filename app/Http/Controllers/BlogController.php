<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:blogs-list', ['only' => ['index','show']]);
         $this->middleware('permission:blogs-create', ['only' => ['create','store']]);
         $this->middleware('permission:blogs-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blogs-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $blogs = Blog::where('active',1)->get();
        return view('blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog_image = "";
        if ($request->hasFile('blog_image')) {
            $data = $request->input('blog_image');
            $blog_image = $request->file('blog_image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('blog_image')->move($destination, $blog_image);
        }

        $data   = Blog::create([
            'title' => $request->title,
            'blog_image' => $blog_image,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        if ($data) {
            return response()->json(['success'=>$request['title']. ' added successfully.']);
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
    public function show(Blog $blog)
    {
        $blog = Blog::where('id',$blog->id)->first();
        return view('blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::where('id',$blog->id)->first();
        return view('blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog_image = "";
        if ($request->hasFile('blog_image')) {
            $data = $request->input('blog_image');
            $blog_image = $request->file('blog_image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('blog_image')->move($destination, $blog_image);
        }

        $blog = Blog::where('id',$blog->id)->first();
        $blog->title = $request->title;
        $blog->blog_image = $blog_image;
        $blog->description = $request->description;
        $blog->save();

        return response()->json(['success'=> $blog['title']. ' updated successfully.']);
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
