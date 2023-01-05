@extends('layouts.main')
@section('title','Challan')
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
                            <h4 class="card-title">Edit @yield('title')</h4>
                            <a  href="{{ route('challan.index') }}" class="btn btn-success btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::model($challan, ['method' => 'PATCH','id'=>'form','enctype'=>'multipart/form-data']) !!}
                        {{  Form::hidden('updated_by', Auth::user()->id ) }}
                        {{  Form::hidden('action', "update" ) }}
                        <div class="card-body">
                            <div class=" row">
                                <div class="col-md-12 col-lg-12">
                                    <h1 align="center"></h1>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="hidden" name="challan_id" value="{{$challan->id}}">
                                        {!! Html::decode(Form::label('name','Student <span class="text-danger">*</span>')) !!}
                                        <select class="form-control py-0" name="student_id" required>
                                            <option disabled>--Please Select--</option>
                                            <option selected value="{{$student_list->id}}">{{$student_list->name}}</option>
                                        </select>
                                        @if ($errors->has('student_id'))  
                                            {!! "<span class='span_danger'>". $errors->first('student_id')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('admission_fee','Admission Fee')) !!}
                                        {{ Form::text('admission_fee', null, array('placeholder' => 'Admission Fee','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('admission_fee'))
                                            {!! "<span class='span_danger'>". $errors->first('admission_fee')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('annual_fee','Annual Fee')) !!}
                                        {{ Form::text('annual_fee', null, array('placeholder' => 'Annual Fee','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('annual_fee'))  
                                            {!! "<span class='span_danger'>". $errors->first('annual_fee')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('transport_fee','Transport Fee')) !!}
                                        {{ Form::text('transport_fee', null, array('placeholder' => 'Transport Fee','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('transport_fee'))
                                            {!! "<span class='span_danger'>". $errors->first('transport_fee')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('others','Others')) !!}
                                        {{ Form::text('others', null, array('placeholder' => 'Others','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('others'))  
                                            {!! "<span class='span_danger'>". $errors->first('others')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('monthly_fee','Monthly Fee <span class="text-danger">*</span>')) !!}
                                        {{ Form::text('monthly_fee', null, array('placeholder' => 'Monthly Fee','class' => 'form-control','autofocus' => ''  )) }}
                                        @if ($errors->has('monthly_fee'))  
                                            {!! "<span class='span_danger'>". $errors->first('monthly_fee')."</span>"!!} 
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
                    url: "{{ route('challan.update',$challan->student_id) }}",
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

@endsection
