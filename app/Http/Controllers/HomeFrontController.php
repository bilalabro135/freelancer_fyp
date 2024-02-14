<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;

use DB;
class HomeFrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $testimonials   = Testimonial::where('active',1)->get();
        $blogs          = Blog::where('active',1)->limit(4)->get();
        $categories     = Category::where('active', 1)
                        ->withCount('projects') 
                        ->limit(4)
                        ->get();
        $projects       = $projects = Project::where('projects.active', 1)
                            ->join('categories', 'categories.id', '=', 'projects.job_category')
                            ->join('users', 'users.id', '=', 'projects.user_id')
                            ->orderBy('projects.created_at', 'desc')
                            ->limit(4)
                            ->get(['projects.*', 'categories.name as category_name', 'users.name as creator']);

    	return view('frontEnd.home',compact('testimonials','blogs','projects','categories'));
    }

    public function service(){

        $testimonials   = Testimonial::where('active',1)->get();
        $projects = Project::where('projects.active', 1)
                    ->join('categories', 'categories.id', '=', 'projects.job_category')
                    ->join('users', 'users.id', '=', 'projects.user_id')
                    ->orderBy('projects.created_at', 'desc')
                    ->paginate(10, ['projects.*', 'categories.name as category_name', 'users.name as creator']);


        return view('frontEnd.services',compact('projects','testimonials'));
    }

    public function blog(){

        $blogs   = Blog::where('active',1)->paginate(10);
        return view('frontEnd.blogs',compact('blogs'));
    }

    public function singleCategory($categoryName){
        $category = Category::where('name',$categoryName)->firstOrFail();
        $projects = Project::where('job_category',$category->id)->where('active',1)->paginate(10);
        return view('frontEnd.category_project',compact('category','projects'));
    }

    public function singleBlog($blogName){
        $blog = Blog::where('title',$blogName)->firstOrFail();
        $user = User::where('id',$blog->user_id)->firstOrFail();
        $blogs= Blog::where('active',1)->whereNotIn('id', [$blog->id])->limit(4)->get();
        return view('frontEnd.single_blog',compact('blog','user','blogs'));
    }

    public function singleService($serviceName){
        $job  = Project::where('job_title',$serviceName)->firstOrFail();
        $user = User::where('id',$job->user_id)->firstOrFail();
        $jobs = Project::where('active',1)->whereNotIn('id', [$job->id])->limit(4)->get();
        return view('frontEnd.single_service',compact('job','user','jobs'));
    }

    public function applyJob($serviceName){
        $job  = Project::where('job_title',$serviceName)->firstOrFail();
        $user = User::where('id',$job->user_id)->firstOrFail();
        $jobs = Project::where('active',1)->whereNotIn('id', [$job->id])->limit(4)->get();
        return view('frontEnd.job_form',compact('job','user','jobs'));
    }

}