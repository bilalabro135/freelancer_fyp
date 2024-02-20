@extends('layouts.main')
@section('title','Jobs')
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
                <form action="{{route('request_completion')}}" method="POST">
                    @csrf
                    <input type="hidden" id="modalProjectId" value="" name="project_id">
                    <input type="hidden" id="modalUserId" value="" name="user_id">
                    <button class="btn btn-primary">Yes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white">
            <div class="nav-scroller">
                <div class="nav nav-tabs nav-line nav-color-primary d-flex justify-content-between align-items-center w-100">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All Jobs
                        <span class="count ml-1">{{ count($projects) }}</span>
                    </a>
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
                            @if(($value->active == 2))
                                <a href="#" class="mr-3 btn btn-primary request-completion-btn" data-toggle="modal" data-target="#modalLoginForm" data-project-id="{{$value->id}}" data-user-id="{{$value->user_id}}">Request Completion?</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(){
        $('.request-completion-btn').on('click', function() {
            var projectId = $(this).data('project-id');
            var userId = $(this).data('user-id');

            $('#modalProjectId').val(projectId);
            $('#modalUserId').val(userId);
        });
    });
    </script>


@endsection
