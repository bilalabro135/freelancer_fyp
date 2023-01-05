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
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
