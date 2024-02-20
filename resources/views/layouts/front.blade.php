<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
	<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script src="{{asset('libs/jquery.min.js')}}" ></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("assets/css/fonts.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<!-- <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.js" ></script> -->
	<script src="{{ asset('assets/js/sweetalert2.all.js') }}" ></script>
	<style>
  		@import url('https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap');
		.span_danger{
			color:red;
		}
		h1,h2,h3,h4,h5,h6,p,span,li,a,input,button{
			font-family: 'Jost' !important;
		}
		.add_image{
			position: relative;
		}
		.add_image label {
			position: absolute;
			top: 0;
			right: -5px;
			max-width: 10px;
			margin: 0;
		}
		.add_image input {
			opacity: 0;
			width: 0;
			height: 0;
		}
		.signup-cta a {
		    background: linear-gradient(135deg, #0A192F 0%, #223D5E 100%) !important;
		    padding: 8px 20px;
		    border-radius: 4px;
		}
		.bg-color-theme{
			background: linear-gradient(135deg, #0A192F 0%, #223D5E 100%) !important;
		}
		.footer-sec{
			background: linear-gradient(135deg, #0A192F 0%, #223D5E 100%) !important;
		}
	</style>
</head>
<body style="background-color: #000 !important;">
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" style="background: #00000096;">

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-light navbar-expand-lg">
				<!-- navbar navbar-expand-md navbar-light bg-white shadow-sm -->
				<div class="container-fluid" style="padding: 25px 20px; border-bottom: 1px solid #ffffff4f;">
					<div class="d-flex">
						<div class="web-logo">
							<img src="{{asset('uploads/logo3-01.png')}}" width="80px">&nbsp;&nbsp;
						</div>
						<ul class="navbar-nav topbar-nav align-items-center" style="gap: 16px;">
					
							<li class="nav-item" style="font-size: 16px;">
								<a href="/" class="text-white font-weight-normal">Home</a>
							</li>
							<li class="nav-item" style="font-size: 16px;">
								<a href="{{route('front.services')}}" class="text-white font-weight-normal">Browse Services</a>
							</li>
							<li class="nav-item" style="font-size: 16px;">
								<a href="{{route('front.blogs')}}" class="text-white font-weight-normal">Blogs</a>
							</li>
							<li class="nav-item" style="font-size: 16px;">
								<a href="#" class="text-white font-weight-normal">Pages</a>
							</li>
							
						</ul>
					</div>
					<div>
						<ul class="navbar-nav topbar-nav align-items-center" style="gap: 16px;">
							@if(!isset(Auth::user()->name))

								<li class="nav-item signup-cta" style="font-size: 16px;">
									<a href="/register" class="text-light font-weight-normal">Post a job</a>
								</li>

								<li class="nav-item signup-cta" style="font-size: 16px;">
									<a href="/register" class="text-light font-weight-normal">Sign Up</a>
								</li>

								<li class="nav-item" style="font-size: 16px;">
									<a href="/login" class="text-white font-weight-normal">Login</a>
								</li>

							@else
								<li class="nav-item" style="font-size: 16px;">
									<a href="#" class="text-white font-weight-normal"><i class="m-0 far fa-user text-white"></i></a>
								</li>
								<li class="nav-item">
									<a href="/logout" class="text-white font-weight-normal"><i class="m-0 fas fa-power-off text-white" style="font-size: 20px;"></i></a>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<?php 
			function url_explode($url){
										
				$explodedUrl = explode("/", $url);
				if(is_array($explodedUrl)){
			
					if (count($explodedUrl) > 0)
					{
						$main = $explodedUrl[0];
						$state = "active";
						return $main;
					}
				}
			}
		?>

        <section class="">
        	@yield('content')
        </section>
	</div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<script src="{{asset('libs/datatable/jquery.dataTables.min.js')}}" defer></script>
<script src="{{asset('libs/datatable/dataTables.bootstrap4.min.js')}}" defer></script>
<script src="{{asset('libs/jquery.validate.js')}}" defer></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<!-- <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script> -->

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<!-- <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script> -->

<!-- Chart JS -->
<!-- <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script> -->

<!-- jQuery Sparkline -->
<!-- <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script> -->

<!-- Chart Circle -->
<!-- <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script> -->

<!-- Datatables -->
<!-- <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script> -->

<!-- Bootstrap Notify -->
<!-- <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script> -->

<!-- Bootstrap Toggle -->
<!-- <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script> -->

<!-- jQuery Vector Maps -->
<!-- <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script> -->

<!-- Google Maps Plugin -->
<!-- <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script> -->

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Azzara JS -->
<script src="{{ asset('assets/js/ready.min.js') }}"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<!-- <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script> -->


    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click','.delete_all', function(e) {
                var id = $(this).data('id');
                    var allVals = [];
                        allVals.push($(this).attr('data-id'));

                if(allVals.length <=0)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select row!',
                    // footer: '<a href>Why do I have this issue?</a>'
                    })
                }  else {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        console.log(result.value);
                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $('#myTable').DataTable().ajax.reload();
                                

                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    data['success'],
                                    'success'
                                )

                            } else if (data['error']) {
                                // alert(data['error']);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data['error'],
                                })
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "It is forign key of another entity, \n It cannot be deleted",
                                })
                            // alert(data.responseText);
                        }
                    });

                    } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary data is safe :)',
                        'error'
                    )
                    }
                })

                }
            });
        });
    </script>
 
</body>
</html>