@extends('layouts.main')
@section('title','Payment method')
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
                         <div class="col-12 col-md-6">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @if(isset($blog->blog_image))
                               <img src="{{asset('uploads/'.$blog->blog_image)}}" style="border-radius: 5px;" width="100%">
                               @else
                               <img src="{{asset('uploads/elementor-placeholder-image.webp')}}" style="border-radius: 5px;" width="100%">
                               @endif
                            </div>
                         </div>
                         <div class="col-12 col-md-6">
                            <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                  <div class="accordion accordion-secondary">
                                        <div class="card-body ">
                                            <h1 class="d-flex justify-content-between align-items-center card-opening card-header">
                                                {{$blog->title}}  
                                                <a  href="{{ url('blogs/'.$blog->id.'/edit') }}" class="btn btn-primary btn-xs ml-auto">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a></h1>
                                                <div class="card-desc p-3">
                                                    {!! ($blog->description) !!}
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
