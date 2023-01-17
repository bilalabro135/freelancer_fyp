<style type="text/css">
        td{
            font-size: 18px;
            font-weight: 600;
        }
        .with-border td{
            border: 1px solid;
        }
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
                        <div style="display:flex;font-family: sans-serif;">
                            <h2 style="margin: 0;font-size: 25px;">HBL</h2>
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
                                                <td width="35%">Challan no:</td>
                                                <td width="35%">{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td width="35%">{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Student Name:</td>
                                                <td width="35%">{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                 <td width="35%">Due Date:</td>
                                                <td width="35%">{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Father's name:</td>
                                                <td width="35%">{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td width="35%">Class:</td>
                                                <td width="35%">{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
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
                                    <table class="table dt-responsive table-two with-border" style="width: 100%;border: 1px solid #000;">
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
                        <div style="display:flex;font-family: sans-serif;">
                            <h2 style="margin: 0;font-size: 25px;">HBL</h2>
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
                                                <td width="35%">Challan no:</td>
                                                <td width="35%">{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td width="35%">{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Student Name:</td>
                                                <td width="35%">{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                 <td width="35%">Due Date:</td>
                                                <td width="35%">{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Father's name:</td>
                                                <td width="35%">{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td width="35%">Class:</td>
                                                <td width="35%">{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
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
                                    <table class="table dt-responsive table-two with-border" style="width: 100%;border: 1px solid #000;">
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
                        <div style="display:flex;font-family: sans-serif;">
                            <h2 style="margin: 0;font-size: 25px;">HBL</h2>
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
                                                <td width="35%">Challan no:</td>
                                                <td width="35%">{{ isset($data->id) ? ($data->id) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td width="35%">{{date('d/m/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Student Name:</td>
                                                <td width="35%">{{ isset($data->name) ? ($data->name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                 <td width="35%">Due Date:</td>
                                                <td width="35%">{{date('10/M/Y')}}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #ebedf2;">
                                                <td width="35%">Father's name:</td>
                                                <td width="35%">{{ isset($data->f_name) ? ($data->f_name) : ""}}</td>
                                            </tr>
                                            <tr>
                                                <td width="35%">Class:</td>
                                                <td width="35%">{{ isset($data->admission_class) ? ($data->admission_class) : ""}}</td>
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
                                    <table class="table dt-responsive table-two with-border" style="width: 100%;border: 1px solid #000;">
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