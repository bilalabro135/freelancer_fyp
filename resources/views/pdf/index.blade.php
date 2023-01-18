<style type="text/css">
    @page {margin:0!important; padding:0!important;margin-left: 10px !important;margin-right: 30px !important}
</style>

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row" style="width: 33.33333333%;float: left;border-right: 1px dashed #000;padding-right:5px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div style="display:flex;font-family: sans-serif;justify-content: space-between;align-items: center;">
                            <h2 style="margin: 0;font-size: 25px;width: 49%;float: left;">HBL</h2>
                            <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Hyderabad</h4>
                        </div>
                        <div class="align-items-center">
                            <h1 style="margin:0;font-family: sans-serif;margin-bottom: 40px;border-bottom: 1px solid #000; width: 100%;padding-bottom: 20px;">The Hyderabad Academy</h1>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-main" style="width: 100%; margin-bottom: 40px;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Challan no:</td>
                                                <td>{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td>{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Due Date:</td>
                                                <td>{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td>{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Student Name:</td>
                                                <td>{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Father's name:</td>
                                                <td>{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table border="1" class="table dt-responsive table-two with-border table-bordered" style="width: 100%;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">-</td>
                                                <td>
                                                    PKR {{$data->student_fee}}.00
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Admission Fee</td>
                                                <td>
                                                        @if($challan->admission_fee)
                                                            {{$challan->admission_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Annual Fee</td>
                                                <td>
                                                        @if($challan->annual_fee)
                                                            {{$challan->annual_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Transport Fee</td>
                                                <td>
                                                        @if($challan->transport_fee)
                                                            {{$challan->transport_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Others</td>
                                                <td>
                                                        @if($challan->others)
                                                            {{$challan->others}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            @foreach($all_reciet as $key => $reciet)
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">{{date('M - Y',strtotime($reciet->created_at))}}</td>
                                                    <td>
                                                        @if($reciet->amount)
                                                            {{$reciet->amount}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">Net amount:</td>
                                                    <td>
                                                        @if(isset($total_fee->total))
                                                            {{$total_fee->total}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">Total:</td>
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
        <div class="row" style="width: 33.33333333%;float: left;border-right: 1px dashed #000; padding-right: 5px;padding-left: 5px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div style="display:flex;font-family: sans-serif;justify-content: space-between;align-items: center;">
                            <h2 style="margin: 0;font-size: 25px;width: 49%;float: left;">HBL</h2>
                            <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Hyderabad</h4>
                        </div>
                        <div class="align-items-center">
                            <h1 style="margin:0;font-family: sans-serif;margin-bottom: 40px;border-bottom: 1px solid #000; width: 100%;padding-bottom: 20px;">The Hyderabad Academy</h1>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-main" style="width: 100%; margin-bottom: 40px;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Challan no:</td>
                                                <td>{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td>{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Due Date:</td>
                                                <td>{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td>{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Student Name:</td>
                                                <td>{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Father's name:</td>
                                                <td>{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table border="1" class="table dt-responsive table-two with-border table-bordered" style="width: 100%;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">-</td>
                                                <td>
                                                    PKR {{$data->student_fee}}.00
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Admission Fee</td>
                                                <td>
                                                        @if($challan->admission_fee)
                                                            {{$challan->admission_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Annual Fee</td>
                                                <td>
                                                        @if($challan->annual_fee)
                                                            {{$challan->annual_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Transport Fee</td>
                                                <td>
                                                        @if($challan->transport_fee)
                                                            {{$challan->transport_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Others</td>
                                                <td>
                                                        @if($challan->others)
                                                            {{$challan->others}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            @foreach($all_reciet as $key => $reciet)
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">{{date('M - Y',strtotime($reciet->created_at))}}</td>
                                                    <td>
                                                        @if($reciet->amount)
                                                            {{$reciet->amount}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Net amount:</td>
                                                <td>
                                                    @if(isset($total_fee->total))
                                                        {{$total_fee->total}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Total:</td>
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
        <div class="row" style="width: 33.33333333%;float: left;padding-left: 5px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div style="display:flex;font-family: sans-serif;justify-content: space-between;align-items: center;">
                            <h2 style="margin: 0;font-size: 25px;width: 49%;float: left;">HBL</h2>
                            <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Hyderabad</h4>
                        </div>
                        <div class="align-items-center">
                            <h1 style="margin:0;font-family: sans-serif;margin-bottom: 40px;border-bottom: 1px solid #000; width: 100%;padding-bottom: 20px;">The Hyderabad Academy</h1>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table dt-responsive table-main" style="width: 100%; margin-bottom: 40px;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Challan no:</td>
                                                <td>{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td>{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Due Date:</td>
                                                <td>{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td>{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Student Name:</td>
                                                <td>{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td>Father's name:</td>
                                                <td>{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table border="1" class="table dt-responsive table-two with-border table-bordered" style="width: 100%;">
                                        <tbody>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">-</td>
                                                <td>
                                                    PKR {{$data->student_fee}}.00
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Admission Fee</td>
                                                <td>
                                                        @if($challan->admission_fee)
                                                            {{$challan->admission_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Annual Fee</td>
                                                <td>
                                                        @if($challan->annual_fee)
                                                            {{$challan->annual_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Transport Fee</td>
                                                <td>
                                                        @if($challan->transport_fee)
                                                            {{$challan->transport_fee}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="50%">Others</td>
                                                <td>
                                                        @if($challan->others)
                                                            {{$challan->others}}
                                                        @else
                                                            -
                                                        @endif
                                                </td>
                                            </tr>
                                            @foreach($all_reciet as $key => $reciet)
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">{{date('M - Y',strtotime($reciet->created_at))}}</td>
                                                    <td>
                                                        @if($reciet->amount)
                                                            {{$reciet->amount}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">Net amount:</td>
                                                    <td>
                                                        @if(isset($total_fee->total))
                                                            {{$total_fee->total}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr style="border-top: 1px solid #ebedf2;">
                                                    <td width="50%">Total:</td>
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
