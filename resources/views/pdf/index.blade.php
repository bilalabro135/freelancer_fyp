<style type="text/css">
    @page {margin:0!important; padding:0!important;margin-left: 10px !important;margin-right: 30px !important}
</style>
    
    @foreach($input as $value)
        @if(count($input) > 1)
            <div class="page-inner" style="page-break-after: always;">
        @else
            <div class="page-inner">
        @endif
                <div class="page-header">
                    <h4 class="page-title">@yield('title')</h4>
                </div>
                <div class="row" style="width: 33.33333333%;float: left;border-right: 1px dashed #000;padding-right:5px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <div style="display:flex;font-family: sans-serif;justify-content: space-between;align-items: center;">
                                    <h2 style="margin: 0;font-size: 25px;width: 49%;float: left;">HBL</h2>
                                    <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Bank</h4>
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
                                                    <tr>
                                                        <td>Challan no:</td>
                                                        <td>{{$value->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Issue date:</td>
                                                        <td>{{date('d-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due date:</td>
                                                        <td>{{date('10-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Student name:</td>
                                                        <td>{{$value->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father's name:</td>
                                                        <td>{{$value->f_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        
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
                                                    <tr>
                                                        <td>-</td>
                                                        <td>PKR: {{$value->student_fee}}.00</td>
                                                    </tr>
                                                    @if($reciet)
                                                        @foreach($reciet as $key => $reciet_value)
                                                            <tr>
                                                                <td width="50%">{{$reciet_value->created_at}}</td>
                                                                <td>{{$reciet_value->amount}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td width="50%">Net amount:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Total:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
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
                                    <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Account</h4>
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
                                                    <tr>
                                                        <td>Challan no:</td>
                                                        <td>{{$value->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Issue date:</td>
                                                        <td>{{date('d-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due date:</td>
                                                        <td>{{date('10-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Student name:</td>
                                                        <td>{{$value->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father's name:</td>
                                                        <td>{{$value->f_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        
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
                                                    <tr>
                                                        <td>-</td>
                                                        <td>PKR: {{$value->student_fee}}.00</td>
                                                    </tr>
                                                    @if($reciet)
                                                        @foreach($reciet as $key => $reciet_value)
                                                            <tr>
                                                                <td width="50%">{{$reciet_value->created_at}}</td>
                                                                <td>{{$reciet_value->amount}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td width="50%">Net amount:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Total:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
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
                                    <h4 style="margin: 0;font-size: 20px;width: 49%;float: right;" align="right">Student</h4>
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
                                                    <tr>
                                                        <td>Challan no:</td>
                                                        <td>{{$value->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Issue date:</td>
                                                        <td>{{date('d-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due date:</td>
                                                        <td>{{date('10-m-Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Student name:</td>
                                                        <td>{{$value->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father's name:</td>
                                                        <td>{{$value->f_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        
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
                                                    <tr>
                                                        <td>-</td>
                                                        <td>PKR: {{$value->student_fee}}.00</td>
                                                    </tr>
                                                    @if($reciet)
                                                        @foreach($reciet as $key => $reciet_value)
                                                            <tr>
                                                                <td width="50%">{{$reciet_value->created_at}}</td>
                                                                <td>{{$reciet_value->amount}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td width="50%">Net amount:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Total:</td>
                                                        @foreach($total as $key => $fee)
                                                            @if($fee->student_id == $value->id)
                                                                <td>
                                                                    {{$fee->total}}
                                                                </td>
                                                            @endif
                                                        @endforeach
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
    @endforeach
    <script type="text/javascript">
        var theDoc = new Doc { TopDown = true };
        var pageRef = theDoc.AddImageUrl(pdfUrl, true, 1903, true);
        while (theDoc.Chainable(pageRef))
        {
            theDoc.Page = theDoc.AddPage();
            //I guessI have to do something here???
            pageRef = theDoc.AddImageToChain(pageRef);
        }
        theDoc.HtmlOptions.Engine = EngineType.Gecko;
    </script>