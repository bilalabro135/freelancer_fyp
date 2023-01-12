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
                    <div class="card-header bg-success" style="background-color: #35cd3a;padding: 0 20px;">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light" style="color: #fff;font-size: 20px;">Challan for the month of {{date('M Y')}}</h4>
                            <a  href="{{ route('challan.index') }}" class="btn btn-success btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-main" style="width: 100%;">
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
                    <div class="card-body" style="margin-top: 40px;">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-two" style="width: 100%;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;background-color: #35cd3a;padding: 0 20px;">
                                                <td width="35%" style="color: #fff;">Issue Date</td>
                                                <td style="color: #fff;">
                                                        Due Date
                                                </td>
                                                <td style="color: #fff;">
                                                        Validity Date
                                                </td>
                                            </tr>
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
                    <div class="card-header bg-success" style="background-color: #35cd3a; padding: 0 20px;margin-top: 40px;">
                        <table>
                            <tbody>
                                <tr>
                                    <td width="50%"><h4 class="card-title text-light" style="color: #fff;font-size: 20px;">Monthly Tution Fee</h4></td>
                                    <td><h4 class="card-title text-light ml-auto" style="color: #fff;">PKR {{$data->student_fee}}.00</h4></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-two" style="width: 100%;">
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