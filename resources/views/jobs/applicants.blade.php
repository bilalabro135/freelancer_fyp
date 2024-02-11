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
                   <div class="card-body">
                      <div class="row">
                         <div class="col-12 col-md-3">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                               <a class="bg-primary p-3 nav-link active show" id="v-pills-home-tab-icons" data-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
                                <i class="fas fa-list-alt text-light"></i> &nbsp;
                               {{$category->name}}
                               </a>
                            </div>
                         </div>
                         <div class="col-12 col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                  <div class="accordion accordion-secondary">
                                        <div class="card-body ">
                                            <h1 class="card-opening card-header">{{$category->name}}</h1>
                                            <div class="card-desc p-3">
                                                {{$category->description}}
                                            </div>
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
