@extends('layouts.main')
@section('title','Jobs')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="page-navs bg-white">
            <div class="nav-scroller">
                <div class="nav nav-tabs nav-line nav-color-primary d-flex align-items-center justify-contents-center w-100">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All Jobs
                        <span class="count ml-1">{{ count($projects) }}</span>
                    </a>
                    <div class="ml-auto">
                        <a href="{{route('jobs.create')}}" class="btn btn-primary">New Job</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-projects">
            @foreach($projects as $key => $value)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="p-2">
                            @if(isset($value->job_image))
                            <img class="card-img-top rounded" style="width: 100%; height: 180px; object-fit: cover" src="{{asset('uploads/'.$value->job_image)}}">
                            @else
                            <img src="{{asset('uploads/elementor-placeholder-image.webp')}}" style="border-radius: 5px; width: 100%; height: 180px; object-fit: cover">
                            @endif
                        </div>
                        <div class="card-body pt-2">
                           <a href="{{ url('jobs/'.$value->id) }}"><h2 class="mb-1 fw-bold">{{$value->job_title}}</h2></a>
                            <p class="text-muted small mb-2">{{date('M,d,Y',strtotime($value->created_at))}}</p>
                            {!! Str::limit($value->description, 100) !!}
                            @if((Auth::user()->id == $value->user_id) || Auth::user()->id == 1)
                                <a href="{{route('applicants',['id'=> $value->id])}}" class="badge badge-success">{{count($value->applicants) ?? ""}} Applicants</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
