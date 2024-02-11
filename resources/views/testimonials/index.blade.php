@extends('layouts.main')
@section('title','Testimonials')
@section('content')
    @include( '../sweet_script')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="page-navs bg-white">
            <div class="nav-scroller">
                <div class="nav nav-tabs nav-line nav-color-primary d-flex align-items-center justify-contents-center w-100">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All Testimonials
                        <span class="count ml-1">{{ count($testimonial) }}</span>
                    </a>
                    <div class="ml-auto">
                        <a href="{{route('testimonials.create')}}" class="btn btn-primary">New Testimony</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-projects">
            @foreach($testimonial as $key => $value)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body pt-2">
                           <a href="{{ url('testimonials/'.$value->id) }}"><h2 class="mb-1 pt-4 fw-bold">{{$value->name}}</h2></a>
                            <p class="text-muted small mb-2">{{$value->brand}}</p>
                            {!! Str::limit($value->description, 100) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {  
            var t = $('#myTable').DataTable({
                    "aaSorting": [],
                    "processing": true,
                    "serverSide": false,
                    "select":true,
                    "ajax": "{{ url('lst_category') }}",
                    "method": "GET",
                    "columns": [
                        {"data": "srno"},
                        {"data": "name"},
                        {"data": "active",orderable:false,searchable:false},
                        {"data": "action",orderable:false,searchable:false},

                    ]
                });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();


        });
    </script>
@endsection
