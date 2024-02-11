@extends('layouts.main')
@section('title','Blog')
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
                            <a  href="{{ route('blogs.index') }}" class="btn btn-primary btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::model($blog, ['method' => 'PATCH','id'=>'form','enctype'=>'multipart/form-data']) !!}
                        {{  Form::hidden('updated_by', Auth::user()->id ) }}
                        {{  Form::hidden('action', "update" ) }}
                         <div class="card-body">
                            <div class=" row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-file input-file-image float-right">
                                        @if(isset($blog->blog_image))
                                        <img class="img-upload-preview" width="300" src="{{asset('uploads/'.$blog->blog_image)}}" alt="preview">
                                        @else
                                        <img class="img-upload-preview" width="300" src="{{asset('uploads/elementor-placeholder-image.webp')}}" alt="preview">
                                        @endif
                                        <input type="file" class="form-control form-control-file" id="uploadImg2" name="blog_image" accept="image/*">
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
                                        {!! Html::decode(Form::label('title','Title <span class="text-danger">*</span>')) !!}
                                        {{ Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('title'))
                                            {!! "<span class='span_danger'>". $errors->first('title')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('description','Description')) !!}
                                        <textarea id="editor" class="form-control" name="description" placeholder="Description">{{$blog->description}}</textarea>
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

            $('#form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('blogs.update',$blog->id) }}",
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
