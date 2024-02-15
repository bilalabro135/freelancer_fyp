@extends('layouts.main')
@section('title','Proposal')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="d-block">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fas fa-user prefix grey-text"></i>
                  <input type="text" id="form34" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="form34">Your name</label>
                </div>

                <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="form29" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="form29">Your email</label>
                </div>

                <div class="md-form mb-5">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" id="form32" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="form32">Subject</label>
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-space">
                   <div class="card-header row justify-content-between align-items-center">
                      <h4 class="pl-3 card-title">@yield('title')</h4>
                      <a href="{{asset('uploads/'.$applicant->portfolio)}}" target="_blank" class="mr-3 btn btn-primary">Portfolio</a>
                   </div>
                    <div class="card-body">
                      <div class="row align-items-baseline">
                        <div class="col-12 col-md-10">
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
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalContactForm">Hire Now</button>
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
                         <div class="col-12 col-md-2">
                            <div class="text-center">
                                @if($applicant->profile_pic)
                                    <img src="{{asset('uploads/'.$applicant->profile_pic)}}">
                                @else
                                    <img src="{{asset('uploads/no_image.png')}}" width="120px">
                                @endif
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
