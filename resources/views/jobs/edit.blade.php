@extends('layouts.main')
@section('title','Job')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light">Edit @yield('title')</h4>
                            <a  href="{{ route('jobs.index') }}" class="btn btn-primary btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::model($project, ['method' => 'PATCH','id'=>'form','enctype'=>'multipart/form-data']) !!}
                        {{  Form::hidden('updated_by', Auth::user()->id ) }}
                        {{  Form::hidden('action', "update" ) }}
                         <div class="card-body">
                            <div class=" row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="hidden" id="project_id" class="form-control" value="{{$project->id}}" name="project_id">
                                            {!! Html::decode(Form::label('job_title','Title <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('job_title', null, array('placeholder' => 'Title','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('job_title'))
                                                {!! "<span class='span_danger'>". $errors->first('job_title')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('project_file','Project File <span class="text-danger">*</span>')) !!}
                                            <input type="file" id="project_file" class="form-control" name="project_file">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('delivery_time','Delivery time <span class="text-danger">*</span>')) !!}
                                            <select class="form-control py-0" name="delivery_time" id="delivery_time">
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">4 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="6">6 Days</option>
                                                <option value="7">7 Days</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('payment_method','Payment method<span class="text-danger">*</span>')) !!}
                                            <select class="form-control py-0" name="payment_method" id="payment_method">
                                                <option selected disabled>--Please select--</option>
                                                @foreach($payment_method as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('price','Price <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('price', null, array('placeholder' => 'Price / PKR','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('price'))
                                                {!! "<span class='span_danger'>". $errors->first('price')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('job_category','Job category<span class="text-danger">*</span>')) !!}
                                            <select class="form-control py-0" name="job_category" id="job_category">
                                                <option selected disabled>--Please select--</option>
                                                @foreach($categories as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('location','Location ')) !!}
                                            <textarea class="form-control" name="location" placeholder="Location & address">{{$project->location}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="input-file input-file-image float-right" id="kt_profile_avatar" >
                                        @if(!isset($project->job_image))
                                            <img src="{{asset('uploads/elementor-placeholder-image.webp')}}" style="border-radius: 5px; object-fit: cover;" width="100%" height="300" class="img-upload-preview">
                                        @else
                                            <img src="{{asset('uploads/'.$project->job_image)}}" style="border-radius: 5px; object-fit: cover;" width="100%" height="300" class="img-upload-preview">
                                        @endif
                                        <input type="file" class="form-control form-control-file" id="uploadImg2" name="job_image" accept="image/*" >
                                        <label for="uploadImg2" class="label-input-file btn btn-default btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-file-image"></i>
                                            </span>
                                            Upload a Image
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('description','Description')) !!}
                                        <textarea id="editor" class="form-control" name="description" placeholder="Description">{{$project->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm mr-2">Save</button>
                                    <button type="reset" class="btn btn-danger  btn-sm ">Cancel</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
        
    <script>
        $(document).ready(function () {  
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#role_id').change(function(){
                var roleId = $(this).val();
                if(roleId) {
                    $.ajax({
                        url: '/categories/'+roleId,
                        type: "POST",
                        data: {"role_id":roleId},
                        dataType: "json",
                        success:function(data) {
                            if(data){
                                $('#job_category').empty();
                                $('#job_category').append('<option selected disabled>--Please select--</option>'); 
                                $.each(data, function(key, value){
                                    $('#job_category').append('<option value="'+ key +'">'+ value.name +'</option>');
                                });
                            } else {
                                $('#job_category').empty();
                            }
                        }
                    });
                }else{
                    $('#job_category').empty();
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('jobs.update',$project->id) }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success){
                            // this.reset();
                            toastr.success(data.success);
                        }else{
                            if (typeof (data.error) !== 'undefined') {
                                toastr.error(data.error);
                            }
                        }
                    },
                    error: function(data) {
                        var txt         = '';
                        // console.log(data.responseJSON.errors[0])
                        for (var key in data.responseJSON.errors) {
                            txt += data.responseJSON.errors[key];
                            txt +='<br>';
                        }
                        toastr.error(txt);
                    }
                });
            });
        });
    </script>

    <script>
        CKEDITOR.replace('editor');
    </script>

@endsection
