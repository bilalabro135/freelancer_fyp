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
                    @if(count($applicants)>0)
                        @foreach($applicants as $key => $value)
                            <div class="card-body">
                              <div class="row">
                                 <div class="col-12 col-md-3">
                                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                       <a class="p-3 nav-link text-dark justify-content-center " href="{{route('view_applicant',['id'=>$value->id])}}" role="tab">
                                        @if(isset($value->user->profile_pic))
                                            <img src="{{asset('uploads/'.$value->user->profile_pic)}}" width="80px">
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
                                                    <h1 class="pl-3 d-flex align-items-center justify-content-between">
                                                        <a href="{{route('view_applicant',['id'=>$value->id])}}">{{$value->user->name ?? ''}}</a>
                                                        <a href="{{route('chat',[$value->user_id])}}" class="mr-3 btn btn-primary">Start Chat <i class="fas fa-comment"></i></a>
                                                    </h1>
                                                    <h2 class="card-opening card-header text-muted">{{$value->user->email ?? ''}}  <br><br> 
                                                        <b><span class="text-info"><i class="fa fa-solid fa-hourglass-start"></i> Duration: {{$value->duration}}</span> <span class="text-info"> <i class="fas fa-solid fa-money-bill"></i> Cost: {{$value->cost}} <i class="fa fa-solid fa-clock"></i> {{$value->created_at_human_readable}} </span></b>
                                                     </h2>
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
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                            <h2 class="text-muted">No Applicants found..!</h2>
                        </div>
                    @endif
                   <div class="card-footer">
                   </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
