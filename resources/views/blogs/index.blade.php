@extends('layouts.main')
@section('title','Blogs')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="page-navs bg-white">
            <div class="nav-scroller">
                <div class="nav nav-tabs nav-line nav-color-primary d-flex align-items-center justify-contents-center w-100">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All Blogs
                        <span class="count ml-1">{{ count($blogs) }}</span>
                    </a>
                    <div class="ml-auto">
                        <a href="{{route('blogs.create')}}" class="btn btn-primary">New Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-projects">
            @foreach($blogs as $key => $value)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="p-2">
                            <img class="card-img-top rounded" style="width: 100%; height: 180px; object-fit: cover" src="{{asset('uploads/'.$value->blog_image)}}">
                        </div>
                        <div class="card-body pt-2">
                           <a href="{{ url('blogs/'.$value->id) }}"><h2 class="mb-1 fw-bold">{{$value->title}}</h2></a>
                            <p class="text-muted small mb-2">{{date('M,d,Y',strtotime($value->created_at))}}</p>
                            {!! Str::limit($value->description, 100) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
