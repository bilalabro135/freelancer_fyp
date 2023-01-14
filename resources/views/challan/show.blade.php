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
                    @if($reciet_final == 1)
                        <div class="card-footer bg-success">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title text-light">Pay challan</h4>
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
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Html::decode(Form::label('name','Student <span class="text-danger">*</span>')) !!}
                                                <select class="form-control py-0" name="student_id" required>
                                                    <option disabled selected>--Please Select--</option>
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                </select>
                                                @if ($errors->has('student_id'))  
                                                    {!! "<span class='span_danger'>". $errors->first('student_id')."</span>"!!} 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Html::decode(Form::label('for_month','For month')) !!}
                                                {{ Form::date('for_month', null, array('class' => 'form-control')) }}
                                                @if ($errors->has('for_month'))
                                                    {!! "<span class='span_danger'>". $errors->first('for_month')."</span>"!!} 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Html::decode(Form::label('fees_pay','Pay for month')) !!}
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
                    @else
                        <div class="card-footer text-light text-center bg-success">
                            <h4 class="card-title text-light">Fees Paid for {{date('M - Y')}}</h4>
                        </div>
                    @endif
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
