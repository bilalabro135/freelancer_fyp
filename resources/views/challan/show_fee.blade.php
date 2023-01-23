@extends('layouts.main')
@section('title','Fee')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Pay @yield('title')</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('id'=>'form','enctype'=>'multipart/form-data')) !!}
                        {{  Form::hidden('action', "store" ) }}
                            @csrf
                            <div class="card-body">
                                <div class=" row">
                                    <div class="col-md-12 col-lg-12">
                                        <h1 align="center"></h1>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('name','Student <span class="text-danger">*</span>')) !!}
                                            <select class="form-control py-0" name="student_id" required>
                                                <option disabled selected>--Please Select--</option>
                                                @foreach($students as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('student_id'))  
                                                {!! "<span class='span_danger'>". $errors->first('student_id')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('fees_pay','Pay <span class="text-danger">*</span>')) !!}
                                            <select class="form-control py-0" name="fees_pay">
                                                <option disabled selected>--Please Select--</option>
                                                <option value="1">Paid</option>
                                            </select>
                                            @if ($errors->has('fees_pay'))
                                                {!! "<span class='span_danger'>". $errors->first('fees_pay')."</span>"!!} 
                                            @endif
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
                    url: "{{ route('pay_challan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success){
                            this.reset();
                            toastr.success(data.success);
                        }else if(data.error){
                            toastr.error(data.error);
                        }
                    },
                    error: function(data) {
                        var txt         = '';
                        console.log(data.responseJSON.errors[0])
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

@endsection
