@extends('layouts.main')
@section('title','Applicants')
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
                      <h4 class="card-title">@yield('title')</h4>
                   </div>
                    @foreach($applicants as $key => $value)
                        <div class="card-body">
                          <div class="row">
                             <div class="col-12 col-md-3">
                                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                   <a class="p-3 nav-link text-dark justify-content-center " href="{{route('view_applicant',['id'=>$value->id])}}" role="tab">
                                    @if($value->profile_pic)
                                        <img src="{{asset('uploads/'.$value->profile_pic)}}">
                                    @else
                                        <img src="{{asset('uploads/no_image.png')}}" width="80px">
                                    @endif
                                   </a>
                                </div>
                             </div>
                             <div class="col-12 col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                   <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                      <div class="accordion accordion-secondary">
                                            <div class="card-body ">
                                                <h1 class="pl-3"><a href="{{route('view_applicant',['id'=>$value->id])}}">{{$value->user->name ?? ''}}</a></h1>
                                                <h2 class="card-opening card-header text-muted">{{$value->user->email ?? ''}}  <br><br> <small class="text-muted"><i class="fa fa-solid fa-hourglass-start"></i> {{$value->duration}}</small> <small class="text-muted"><i class="fa fa-solid fa-clock"></i> {{$value->created_at_human_readable}}</small></h2>
                                                <div class="card-desc px-3">
                                                    {!! $value->cover_letter ? Str::limit($value->cover_letter, 100) : '' !!}

                                                </div>
                                            </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                        </div>
                    @endforeach
                   <div class="card-footer">
                   </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
