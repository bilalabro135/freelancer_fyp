@extends('layouts.main')
@section('title','Proposal')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Hire them</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="d-block">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form">
                    <h2 class="text-center" style="font-size: 22px;">Are you sure?</h2>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                <form action="{{route('hire_person')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$applicant->project_id}}" name="project_id">
                    <input type="hidden" value="{{$applicant->user_id}}" name="user_id">
                    <input type="hidden" value="{{$applicant->cost}}" name="cost">
                    <button class="btn btn-primary">Yes</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-space">
                   <div class="card-header row justify-content-between align-items-center">
                      <h4 class="pl-3 card-title">@yield('title')</h4>
                      <div>
                        <a href="{{route('chat',[$applicant->user_id])}}" class="mr-3 btn btn-primary">Start Chat <i class="fas fa-comment"></i></a>
                        <a href="{{asset('uploads/'.$applicant->portfolio)}}" target="_blank" class="mr-3 btn btn-primary">Portfolio</a>
                      </div>
                   </div>
                    <div class="card-body">
                      <div class="row align-items-baseline">
                        <div class="col-12 col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                  <div class="accordion accordion-secondary">
                                        <div class="card-body ">
                                            <div class="card-opening card-header row align-items-center">
                                                <div class="col-md-9 col-sm-9">
                                                    <h1 class="" style="font-size: 25px;">{{$applicant->user->name ?? ''}} </h1>
                                                    <p class="pr-5">{{$applicant->user->description ?? ''}}</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <p><i class="fa fa-envelope text-primary" aria-hidden="true"></i> {{$applicant->user->email ?? ''}}</p>
                                                    <p><i class="fa fa-phone text-primary" aria-hidden="true" style="transform: rotate(90deg);"></i> {{$applicant->user->contact_no ?? ''}}</p>
                                                    <div class="text-center">
                                                      <a href="" class="mr-3 btn btn-primary" data-toggle="modal" data-target="#modalLoginForm">Hire Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted"></p>
                                            <div class="card-desc p-3">
                                                <h2 class="card-header pl-0 font-weight-bold">Cover Letter</h2>
                                                <p class="pt-4">{!! $applicant->cover_letter ? $applicant->cover_letter : '' !!}</p>

                                            </div>
                                        </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-12 col-md-3">
                            <div class="text-center">
                                @if($applicant->profile_pic)
                                    <img src="{{asset('uploads/'.$applicant->profile_pic)}}">
                                @else
                                    <img src="{{asset('uploads/no_image.png')}}" width="120px">
                                @endif
                            </div>
                            <div class="mt-5 p-3" style="border: 1px solid rgb(235 236 236);">
                                <p class="mb-5"><i class="fas fa-solid fa-money-bill"></i> Estimated cost: <br><b class="pull-right">{{$applicant->cost}} PKR</b></p>
                                <p class="mb-5"><i class="fas fa-history"></i> Experience: <br><b class="pull-right">{{$applicant->experience}} Years</b></p>
                                <p class="mb-5"><i class="far fa-clock"></i> Estimated time: <br><b class="pull-right">{{$applicant->duration}}</b></p>
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
