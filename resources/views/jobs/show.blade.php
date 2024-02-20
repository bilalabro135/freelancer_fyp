@extends('layouts.main')
@section('title','Job overview')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-space">
                   <div class="card-header">
                      <h4 class="card-title">{{$project->job_title}}</h4>
                   </div>
                   <div class="card-body">
                      <div class="row">
                         <div class="col-12 col-md-6">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @if(isset($project->job_image))
                                    <img src="{{asset('uploads/'.$project->job_image)}}" style="border-radius: 5px; object-fit: cover;" width="100%" height="400px">
                                @else
                                    <img src="{{asset('uploads/elementor-placeholder-image.webp')}}" style="border-radius: 5px; object-fit: cover;" width="100%" height="400px">
                                @endif
                            </div>
                         </div>
                         <div class="col-12 col-md-6">
                            <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                  <div class="accordion accordion-secondary">
                                        <div class="card-body ">
                                            <h1 class="d-flex justify-content-between align-items-center card-opening card-header">
                                                {{$project->job_title}}
                                                @if(Auth::user()->id == $project->user_id)
                                                    <span class="d-flex justify-content-between align-items-center">
                                                        <a  href="{{ url('jobs/'.$project->id.'/edit') }}" class="btn btn-primary btn-xs ml-auto">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        &nbsp;
                                                        <button class="btn btn-danger btn-xs delete_all" data-url="{{url('del_job')}}" data-id="{{$project->id}}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </h1>
                                            <div class="p-3 d-flex justify-content-between">
                                                <h2>PKR: <b>{{$project->price}}</b></h2>
                                                <p>
                                                    <span class="text-muted text-center pull-right">Job Category:</span><br>
                                                    <span class="badge badge-success">{{isset($project->job_category->name) ? $project->job_category->name : "No Category selected"}}</span>
                                                </p>
                                            </div>
                                            <hr class="m-0">
                                            <div class="p-3 d-flex justify-content-between">
                                                <h3>EST: <b>{{$project->delivery_time}} Days</b></h3>
                                                <p>
                                                    <span class="text-muted text-center pull-right">Payment Method:</span><br>
                                                    <span class="badge badge-success">{{isset($project->payment_method->method_title) ? $project->payment_method->method_title : "No Payment Method"}}</span>
                                                </p>
                                            </div>
                                            <hr class="m-0">
                                            <div class="p-3 d-flex justify-content-between align-items-center">
                                                <h3>Location:<br/><br/> <b>{{$project->location}}</b></h3>
                                                @if(Auth::user()->id == $project->user_id)
                                                    <a href="{{route('applicants',['id'=> $project->id])}}" class="badge badge-success">{{$applicants}} Applicants</a>
                                                @endif
                                            </div>
                                        </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-12 col-md-12">
                            <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                  <div class="accordion accordion-secondary">
                                    <div class="card-desc py-5">
                                        <h2>Description</h2>
                                        <hr class="mb-5">
                                        {!! ($project->description) !!}
                                    </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card-footer">
                   </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
