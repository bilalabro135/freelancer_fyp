<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:category-list', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('categories.index');
    }

    public function list(){
        $data   = Category::orderBy('categories.name')
                    ->select(
                                'categories.id',
                                'categories.name',
                                'categories.active'
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
                        <a class="btn btn-info btn-xs" href="categories/'.$data->id.'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-xs" href="categories/'.$data->id.'/edit" id="'.$data->id.'">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-xs delete_all"
                            data-url="'. url('del_category') .'" data-id="'.$data->id.'">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>';
                })
                ->addColumn('srno','')
                ->rawColumns(['srno','','action', 'active'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_category = $category = Category::where('name', $request->name)->where('active', 1)->first();

        if (!empty($check_category)) {
            return response()->json(['error'=>'Category '.$request->name. ' already exists']);
        }
        $category = Category::create([
            'name'          => $request->name,
            'description'   => $request->description
        ]);

        if ($category) {
            return response()->json(['success'=>'Category '.$category['name']. ' added successfully.']);
        }else{
            return response()->json(['error'=>'Failed to add category']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::where('id',$category->id)->first();
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::where('id',$category->id)->first();
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category_update = Category::where('id',$category->id)->first();
        $category_update->name = $request->name;
        $category_update->description = $request->description;
        $category_update->save();

        return response()->json(['success'=>'Category '.$category_update['name']. ' updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data   = Category::where('id',explode(",", $request->ids))->delete();
        if ($data) {
            return response()->json(['success'=>" Record deleted successfully."]);
        }
    }
}
