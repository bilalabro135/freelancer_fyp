@extends('layouts.main')
@section('title','Challan')
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
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">@yield('title')</h4>
            <a class="btn btn-success" href="{{ url('generate-pdf/'.$challan->id) }}">Export to PDF</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light">Challan for the month of {{date('M Y')}}</h4>
                            <a  href="{{ route('challan.index') }}" class="btn btn-success btn-xs ml-auto">
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
                                                <td width="50%">Challan no:</td>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header bg-success">
                        <div class="d-flex align-items-center justify-content-around">
                            <h4 class="card-title text-light">Issue Date</h4>
                            <h4 class="card-title text-light">Due Date</h4>
                            <h4 class="card-title text-light">Validity Date</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-two">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">{{date('d/m/Y')}}</td>
                                                <td>
                                                        {{date('10/M/Y')}}
                                                </td>
                                                <td>
                                                        {{date('10/M/Y')}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header bg-success">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light">Monthly Tution Fee</h4>
                            <h4 class="card-title text-light ml-auto">PKR {{$data->student_fee}}.00</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-two">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Admission Fee</td>
                                                <td>
                                                        @if($challan->admission_fee)
                                                            {{$challan->admission_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                                <td>
                                                            -
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Annual Fee</td>
                                                <td>
                                                        @if($challan->annual_fee)
                                                            {{$challan->annual_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                                <td>
                                                            -
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Transport Fee</td>
                                                <td>
                                                        @if($challan->transport_fee)
                                                            {{$challan->transport_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                                <td>
                                                            -
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Others</td>
                                                <td>
                                                        @if($challan->others)
                                                            {{$challan->others}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                                <td>
                                                            -
                                                </td>
                                            </tr>
                                            @foreach($all_reciet as $key => $reciet)
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="35%">{{date('M - Y',strtotime($reciet->created_at))}}</td>
                                                    <td>
                                                        @if($reciet->amount)
                                                            {{$reciet->amount}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                            -
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="35%">Net amount:</td>
                                                    <td>
                                                        @if(isset($total_fee->total))
                                                            {{$total_fee->total}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                            -
                                                    </td>
                                                </tr>
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="35%">Total:</td>
                                                    <td>
                                                       -
                                                    </td>
                                                    <td>
                                                        @if(isset($total_fee->total))
                                                            {{$total_fee->total}}
                                                        @else
                                                            -
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
