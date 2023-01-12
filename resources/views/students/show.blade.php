@extends('layouts.main')
@section('title','Student')
@section('content')
    @include( '../sweet_script')

    <style type="text/css">
        td{
            font-size: 18px;
            font-weight: 600;
        }
        .table-main td{
            border: 1px solid;
        }
        .table-two td{
            text-align: center;
            border: 1px solid #ebedf2;
        }
        .table-two tr{
            border: 1px solid #ebedf2;
        }
    </style>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light">Student Details</h4>
                            <a  href="{{ route('students.index') }}" class="btn btn-success btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-3 text-center">
                                <img src="{{asset('uploads/'.$data->student_pic)}}" style="width:100%; height: 100%;object-fit: cover; object-position: center; border-radius: 120px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-main">
                                        <tbody>

                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Student ID:</td>
                                                <td>
                                                        {{ isset($data->id) ? ($data->id) : ""}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td>
                                                        {{ isset($data->name) ? ($data->name) : ""}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Father's name:</td>
                                                <td>
                                                        {{ isset($data->f_name) ? ($data->f_name) : ""}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td>
                                                        {{ isset($data->admission_class) ? ($data->admission_class) : ""}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                
                                                    @if((isset($data->active)) && ( ($data->active == 1) || ($data->active == "Active") ) )
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 text-center">
                                <h2>Recent Photograph</h2>
                                <img src="{{asset('uploads/'.$data->recent_photograph)}}" style="width:100%; height: 85%;object-fit: cover; object-position: center;">
                            </div>
                            <div class="col-md-6 text-center">
                                <h2>Birth Certificate</h2>
                                <img src="{{asset('uploads/'.$data->birth_certificate)}}" style="width:100%; height: 85%;object-fit: cover; object-position: center;">
                            </div>
                            <div class="col-md-6 text-center">
                                <h2>Father's CNIC</h2>
                                <img src="{{asset('uploads/'.$data->father_cnic)}}" style="width:100%; height: 85%;object-fit: cover; object-position: center;">
                            </div>
                            <div class="col-md-6 text-center">
                                <h2>Leaving Certificate</h2>
                                <img src="{{asset('uploads/'.$data->leave_certificate)}}" style="width:100%; height: 85%;object-fit: cover; object-position: center;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
