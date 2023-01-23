@extends('layouts.main')
@section('title','Student')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <!--begin::Form-->
            {!! Form::model($data, ['method' => 'PATCH','id'=>'form','enctype'=>'multipart/form-data']) !!}
                {{  Form::hidden('updated_by', Auth::user()->id ) }}
                {{  Form::hidden('action', "update" ) }}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-light">Add @yield('title')</h4>
                                    <a  href="{{ route('students.index') }}" class="btn btn-success btn-xs ml-auto">
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                 <div class=" row align-items-center">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <p class="m-0"><u>OFFICE USE ONLY</u></p>
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('student_fee','Fee per month <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('student_fee', null, array('placeholder' => 'Fee per month','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('student_fee'))  
                                                {!! "<span class='span_danger'>". $errors->first('student_fee')."</span>"!!} 
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('admission_date','Date of admission <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('admission_date', null, array('class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('admission_date'))  
                                                {!! "<span class='span_danger'>". $errors->first('admission_date')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <h2 style="font-size: 23px; text-align: center;">THE HYDERABAD ACADEMY <br> SCHOOL</h2>
                                            <p style="font-size: 16px; text-align: center;">DUAL EDUCATION</p>
                                            <br>
                                            <br>
                                            <h2 style="font-size: 35px; text-align: center;"><u>ADMISSION FORM</u></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="profile-pic text-center">
                                                <img alt="User Pic" src="@if($data->student_pic) {{asset('uploads/'.$data->student_pic)}} @else {{asset('uploads/images.png')}} @endif" id="profile-image1" style="width: 210px;object-fit: cover;height: 230px;border: 2px solid #d1d1d1;">
                                                <input id="profile-image-upload" class="hidden" style="visibility: hidden;" type="file" onchange="previewFile()" name="student_pic">
                                                <div style="color:#999;" >  </div>
                                            </div>
                                            @if ($errors->has('student_pic'))  
                                                {!! "<span class='span_danger'>". $errors->first('student_pic')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-light">Particulars of student</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class=" row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('name','Name of student <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('name', null, array('placeholder' => 'Name of student','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('name'))  
                                                {!! "<span class='span_danger'>". $errors->first('name')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('gender','Gender <span class="text-danger">*</span>')) !!}
                                            <select id="gender" name="gender" class="form-control py-0">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                {!! "<span class='span_danger'>". $errors->first('gender')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('dob','Date of birth <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('dob', null, array('class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('dob'))  
                                                {!! "<span class='span_danger'>". $errors->first('dob')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('admission_class','Admission in class <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('admission_class', null, array('placeholder' => 'Admission in class','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('admission_class'))  
                                                {!! "<span class='span_danger'>". $errors->first('admission_class')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('acdm_smstr','Academic/Semester <span class="text-danger">*</span>')) !!}
                                            <select id="acdm_smstr" name="acdm_smstr" class="form-control py-0">
                                                <option value="academic">Academic</option>
                                                <option value="semester">Semester</option>
                                            </select>
                                            @if ($errors->has('acdm_smstr'))  
                                                {!! "<span class='span_danger'>". $errors->first('acdm_smstr')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('last_attend','Name of last school attended <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('last_attend', null, array('placeholder' => 'Name of last school attended','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('last_attend'))  
                                                {!! "<span class='span_danger'>". $errors->first('last_attend')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('date_leave','Date of leaving school <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('date_leave', null, array('placeholder' => 'Date of leaving school','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('date_leave'))  
                                                {!! "<span class='span_danger'>". $errors->first('date_leave')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('last_pass','Last class passed <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('last_pass', null, array('placeholder' => 'Last class passed','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('last_pass'))  
                                                {!! "<span class='span_danger'>". $errors->first('last_pass')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('transport','Transport required <span class="text-danger">*</span>')) !!}
                                            <select id="transport" name="transport" class="form-control py-0">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            @if ($errors->has('transport'))  
                                                {!! "<span class='span_danger'>". $errors->first('transport')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('active','Active<span class="text-danger">*</span>')) !!}
                                        <span class="switch switch-sm switch-icon switch-success">
                                            <?php
                                                $actv= 0;
                                                if(($data->active == "Active") || ($data->active == 1)){
                                                    $actv= 1;
                                                }
                                            ?>
                                            <label>
                                                {!! Form::checkbox('active',1,$actv,  array('class' => 'form-control')) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                    
                                        @if ($errors->has('active'))  
                                            {!! "<span class='span_danger'>". $errors->first('active')."</span>"!!} 
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-header bg-success">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-light">Particulars of parent's/guardian</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('f_name','Fathers name <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('f_name', null, array('placeholder' => 'Fathers name','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('f_name'))  
                                                {!! "<span class='span_danger'>". $errors->first('f_name')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('caste','Caste <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('caste', null, array('placeholder' => 'Caste','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('caste'))  
                                                {!! "<span class='span_danger'>". $errors->first('caste')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('occupation','Fathers occupation <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('occupation', null, array('placeholder' => 'Fathers occupation','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('occupation'))  
                                                {!! "<span class='span_danger'>". $errors->first('occupation')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('phone','Phone no (Office) <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('phone', null, array('placeholder' => 'Phone no:','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('phone'))  
                                                {!! "<span class='span_danger'>". $errors->first('phone')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('address','Residential address <span class="text-danger">*</span>')) !!}
                                            {{ Form::textarea('address', null, array('placeholder' => 'Residential address','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('address'))  
                                                {!! "<span class='span_danger'>". $errors->first('address')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('cnic','CNIC <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('cnic', null, array('placeholder' => 'CNIC','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('cnic'))  
                                                {!! "<span class='span_danger'>". $errors->first('cnic')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('phone_res','Phone no (Residential) <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('phone_res', null, array('placeholder' => 'Enter rating message','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('phone_res'))  
                                                {!! "<span class='span_danger'>". $errors->first('phone_res')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('name_guardian','Name of guardian <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('name_guardian', null, array('placeholder' => 'Name of guardian','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('name_guardian'))  
                                                {!! "<span class='span_danger'>". $errors->first('name_guardian')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('guardian_caste','Caste (Guardian) <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('guardian_caste', null, array('placeholder' => 'Caste (Guardian)','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('guardian_caste'))  
                                                {!! "<span class='span_danger'>". $errors->first('guardian_caste')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('rel_student','Relation with student <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('rel_student', null, array('placeholder' => 'Relation with student','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('rel_student'))
                                                {!! "<span class='span_danger'>". $errors->first('rel_student')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('guardian_phone','Phone no (Guardian) <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('guardian_phone', null, array('placeholder' => 'Phone no (Guardian)','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('guardian_phone'))  
                                                {!! "<span class='span_danger'>". $errors->first('guardian_phone')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('guardian_cnic','CNIC (Guardian) <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('guardian_cnic', null, array('placeholder' => 'CNIC (Guardian)','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('guardian_cnic'))  
                                                {!! "<span class='span_danger'>". $errors->first('guardian_cnic')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('guardian_address','Address (Guardian) <span class="text-danger">*</span>')) !!}
                                            {{ Form::textarea('guardian_address', null, array('placeholder' => 'Address (Guardian)','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('guardian_address'))  
                                                {!! "<span class='span_danger'>". $errors->first('guardian_address')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-success">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-light">Admission office</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <hr style="width: 100%; opacity: 0.6;">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('assesment_date','Assesment of student age (date) <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('assesment_date', null, array('class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('assesment_date'))  
                                                {!! "<span class='span_danger'>". $errors->first('assesment_date')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('dob_student','DOB of student <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('dob_student', null, array('placeholder' => 'DOB of student','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('dob_student'))  
                                                {!! "<span class='span_danger'>". $errors->first('dob_student')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('age','Age of student <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('age', null, array('placeholder' => 'Age of student','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('age'))  
                                                {!! "<span class='span_danger'>". $errors->first('age')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group text-left">
                                            {!! Html::decode(Form::label('age_required','Age limit <span class="text-danger">*</span>')) !!}
                                            <select id="age_required" name="age_required" class="form-control py-0">
                                                <option value="underage">Underage</option>
                                                <option value="overage">Overage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('case_ref_class','Admission in class <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('case_ref_class', null, array('placeholder' => 'Admission in class','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('case_ref_class'))  
                                                {!! "<span class='span_danger'>". $errors->first('case_ref_class')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('forward_to','Forwarded to <span class="text-danger">*</span>')) !!}
                                            {{ Form::text('forward_to', null, array('placeholder' => 'Forwarded to','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('forward_to'))  
                                                {!! "<span class='span_danger'>". $errors->first('forward_to')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('dated','Dated <span class="text-danger">*</span>')) !!}
                                            {{ Form::date('dated', null, array('placeholder' => 'Dated','class' => 'form-control','autofocus' => ''  )) }}
                                            @if ($errors->has('dated'))  
                                                {!! "<span class='span_danger'>". $errors->first('dated')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-success">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title text-light">Attachments</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('recent_photograph','Recent photography')) !!}
                                            <div class="profile-pic text-center">
                                                <input type="file" class="form-control py-1" accept=".jpg,.png,.jpeg,.gif" name="recent_photograph">
                                            </div>
                                            @if ($errors->has('recent_photograph'))  
                                                {!! "<span class='span_danger'>". $errors->first('recent_photograph')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('recent_photograph','Birth certificate')) !!}
                                            <div class="profile-pic text-center">
                                                <input type="file" class="form-control py-1" accept=".jpg,.png,.jpeg,.gif" name="birth_certificate">
                                            </div>
                                            @if ($errors->has('birth_certificate'))  
                                                {!! "<span class='span_danger'>". $errors->first('birth_certificate')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('recent_photograph','Leave certificate')) !!}
                                            <div class="profile-pic text-center">
                                                <input type="file" class="form-control py-1" accept=".jpg,.png,.jpeg,.gif" name="leave_certificate">
                                            </div>
                                            @if ($errors->has('leave_certificate'))  
                                                {!! "<span class='span_danger'>". $errors->first('leave_certificate')."</span>"!!} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('recent_photograph','Father CNIC')) !!}
                                            <div class="profile-pic text-center">
                                                <input type="file" class="form-control py-1" accept=".jpg,.png,.jpeg,.gif" name="father_cnic">
                                            </div>
                                            @if ($errors->has('father_cnic'))  
                                                {!! "<span class='span_danger'>". $errors->first('father_cnic')."</span>"!!} 
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
                        <!--end::Form-->
                            
                        </div>
                    </div>
            {!! Form::close() !!}
            <!--end::Form-->
        </div>
    </div>
    
    <script type="text/javascript">
        function previewFile() {
              var preview = document.getElementById('profile-image1');
              var file    = document.getElementById('profile-image-upload').files[0];
              var reader  = new FileReader();

              reader.addEventListener("load", function () {
                preview.src = reader.result;
              }, false);

            file.value = reader.result;

              if (file) {
                reader.readAsDataURL(file);
              }
            }
            $(function() {
                $('#profile-image1').on('click', function() {
                    $('#profile-image-upload').click();
                });
            });
    </script>
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
                    url: "{{ route('students.update',$data->id) }}",
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
