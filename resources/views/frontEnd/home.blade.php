@extends('layouts.front')
@section('title','Home - FreeIO')
@section('content')
<style type="text/css">
	body{
		background-color: #fff !important;
	}
	h2{
		font-size: 35px;
	}
	h3{
		font-size: 25px;
	}
	h4{
		font-size: 20px;
	}
	span{
		font-size: 15px;
	}
	p{
		font-size: 16px;
	}
	.offer-sec{
		color: #fff;
		padding: 80px 0;
	}
	.services-sec{
		padding: 80px 0;
	}
	i{
		font-size: 30px;
		margin: 20px 0;
		color: #fff;
	}
	.category-block {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    padding: 12px 10px;
	    border: 1px solid #c9c9c9;
	    transition: 0.2s;
	}
	.category-block:hover{
		transform: scale(1.1);
	}
	.testi-content {
	    width: 80%;
	    display: block;
	    margin: 60px auto;
	}
	.testi-head{
		margin-top: 100px;
	}
	.blog-wrapper{
		box-shadow: 0 6px 15px 0 rgba(64, 79, 104, 0.05);
		border-radius: 8px;
	}
	.blog-img img{
		border-top-right-radius: 8px;
		border-top-left-radius: 8px;
	}
	.blog-wrapper .blog-content{
		padding: 20px;
	}
	.testimonials-sec{
		padding: 70px 0;
	}
	.subfoot{
		border-bottom: 1px solid #6b717785;
		margin: 0;
	}
	.banner-sec{
		background-image: url('{{asset("uploads/banner-image-main.jpg")}}');
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		height: 100vh;
	}
	.row-globe-bg{
		background-image: url('{{asset("uploads/global-technologies-data-world-map-banner-background-3d-computer-network-covering-planet_90380-4552.jpg")}}');
		background-repeat: no-repeat;
		background-position: center left;
		background-size: 38%;
		height: auto;
	}
	.banner-sec:after{
		content: "";
		display: block;
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		width: 100%;
		height: auto;
		background-color: #0000008c;
	}
	@keyframes typewriter {
	  from { width: 0; }
	  to { width: 100%; }
	}
	@keyframes blinkCursor {
	  from { border-right-color: rgba(255,255,255,.75); }
	  to { border-right-color: transparent; }
	}
	.typewriter h1, .typewriter h2 {
	  overflow: hidden;
	  border-right: .15em solid rgba(255,255,255,.75);
	  white-space: nowrap;
	  margin: 0 auto;
	  letter-spacing: .15em;
	  animation: typewriter 4s steps(40, end) forwards,
	             blinkCursor 500ms steps(40, end) infinite;
	  max-width: 100%;
	}
	.typewriter p {
	  opacity: 0;
	  transition: opacity 2s ease;
	}
	.show {
	  opacity: 1 !important;
	}
	.heading-group {
	  display: none;
	}
	.category-sec{
		padding: 70px 0;
	}
	.my-steps-col{
		border: 1px solid #ffffff4f;
		padding: 30px;
	}
	.how-its-sec{
		padding: 70px 0;
	}
</style>
<div class="home-page">
	<!-- Banner Section -->
	<section class="banner-sec d-flex align-items-center" style="padding: 85px 0 0 0;">
	  <div class="container-fluid">
	    <div class="row justify-content-between align-items-center" style="position: relative; z-index: 9;">
	      <div class="col-md-12">
	        <div class="banner-main">
	          <div class="heading-group typewriter" id="group1">
	            <h1 style="text-align: left;font-size: 45px; color: #fff; font-weight: 600;">Welcome to the Future of Creation!</h1>
	            <p style="font-size: 20px; color: #fff;">Emphasizes the innovative aspect of your service and warmly welcomes visitors.</p>
	          </div>
	          <div class="heading-group typewriter" id="group2">
	            <h2 style="text-align: left;font-size: 45px; color: #fff; font-weight: 600;">Design Your Dreams with Top 3D Designers</h2>
	            <p style="font-size: 20px; color: #fff;">Highlights the creative process and the expertise of your 3D designers in bringing ideas to life.</p>
	          </div>
	          <div class="heading-group typewriter" id="group3">
	            <h2 style="text-align: left;font-size: 45px; color: #fff; font-weight: 600;">Bring Design to Reality with 3D Printing Vendors</h2>
	            <p style="font-size: 20px; color: #fff;">Focuses on the practical aspect of making designs tangible, showcasing the role of vendors in the 3D printing process to deliver final products to clients.</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	<!-- Banner Section -->


	<!-- Offer Section -->
	<section class="offer-sec">
		<div class="container-fluid">
			<div class="row row-globe-bg">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					<div class="head mb-5">
						<h2>Need something done?</h2>
						<p>Most viewed and all-time top-selling services</p>
					</div>
					<h3>Post a job</h3>
					<ul>
						<li><p>Free and easy job posting.</p></li>
						<li><p>Connect instantly with expert 3D designers and vendors.</p></li>
						<li><p>Share your project’s title and details to start.</p></li>
					</ul>

					<h3>Choose designers and vendors</h3>
					<ul>
						<li><p>Browse and select skilled 3D designers and vendors effortlessly.</p></li>
						<li><p>Access portfolios and reviews to make informed choices.</p></li>
						<li><p>Ideal for custom 3D designs and printing projects.</p></li>
					</ul>

					<h3>We’re Here to Help</h3>
					<ul>
						<li><p>Dedicated support for your project’s success.</p></li>
						<li><p>Guidance on posting jobs and selecting the right freelancers.</p></li>
						<li><p>Seamless experience from start to finish.</p></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Offer Section -->

	<!-- Category Section -->
	<section class="category-sec bg-color-theme" style="margin-top: 70px;">
		<div class="container-fluid">
			<div class="categories-head text-white">
				<h2>Browse talent by category</h2>
				<p>Get some Inspirations from 100+ skills</p>
			</div>
			<div class="categories mt-5">
				<div class="row">
					<div class="col-md-12 mb-5 ">
						<h3 class="text-center text-white">3D designer categories</h3>
					</div>
					@foreach($categories_designers as $key => $value)
						<div class="col-md-3 mb-5 ">
							<div class="category-block">
								<a class="text-white" href="{{ route('front.category', ['category' => $value->name]) }}">
								    <h4>{{ $value->name }}</h4>
								    <p>{{ $value->projects_count }} Services</p>
								</a>

							</div>
						</div>
					@endforeach
					<div class="col-md-12 mb-5 ">
						<h3 class="text-center text-white">3D vendor categories</h3>
					</div>
					@foreach($categories_vendors as $key => $value)
						<div class="col-md-3 mb-5 ">
							<div class="category-block">
								<a class="text-white" href="{{ route('front.category', ['category' => $value->name]) }}">
								    <h4>{{ $value->name }}</h4>
								    <p>{{ $value->projects_count }} Services</p>
								</a>

							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- Category Section -->

	<!-- Services Section -->
	<section class="services-sec">
		<div class="container-fluid">
			<div class="services-head text-white">
				<h2>Popular Services</h2>
				<p>Most viewed and all-time top-selling services</p>
			</div>
			<div class="services mt-5">
				<div class="row">
					@foreach($projects as $key => $value)
					<div class="col-md-6 mb-5">
						<div style="padding: 15px; border: 1px solid #e9e9e9;">
							<div class="row">
								<div class="col-md-6"><img width="100%" style="height: 190px;object-fit: cover;object-position: center;;" src="{{ asset('/uploads/'.$value->job_image) }}"></div>
								<div class="col-md-6 text-white">
									<p>{{$value->category_name}}</p>
									<h3><a class="text-white" href="{{ route('front.service', ['service' => $value->job_title]) }}">{{$value->job_title}}</a></h3>
									<hr class="mr-4 my-2">
									{!! Str::limit($value->description, 60) !!}
									<hr class="mr-4 my-2">
									<span><a href="#" class="text-white">{{$value->creator}}</a> Starting at: {{'PKR '.$value->price}}</span>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section -->

	<!-- How it works Section -->
	<section class="how-its-sec bg-color-theme">
		<div class="container">
			<div class="head text-white text-center">
				<h2>How it works</h2>
				<p class="text-muted">3 easy steps to get your printed model</p>
			</div>
			<div class="row">
				<div class="col-md-4 my-steps-col mt-5">
					<div><img src="{{asset('uploads/illustration_modelConfiguration.svg')}}" width="100%"></div>
					<div class="p-4 text-white">
						<h3>Upload your 3D models and start configuring</h3>
						<p>We support over 35 file formats including STL, OBJ, STEP, ZIP. All uploads are secure and confidential.</p>
					</div>
				</div>
				<div class="col-md-4 my-steps-col mt-5">
					<div><img src="{{asset('uploads/illustration_modelProduction.svg')}}" width="100%"></div>
					<div class="p-4 text-white">
						<h3>Choose the material, finish and color</h3>
						<p>Our catalog contains more than 20 different technologies and over 100 materials, with a variety of different finish and color options.</p>
					</div>
				</div>
				<div class="col-md-4 my-steps-col mt-5">
					<div><img src="{{asset('uploads/illustration_modelDelivery.svg')}}" width="100%"></div>
					<div class="p-4 text-white">
						<h3>Select the best offer and get your parts delivered</h3>
						<p>Choose your preferred manufacturer from more than 150 professional services worldwide and receive your order fast and hassle-free.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- How it works Section -->

	<!-- Testimonials Section -->
	<section class="testimonials-sec">
		<div class="container-fluid">
			<div class="testi-head text-center text-white">
				<h2>Testimonials</h2>
				<p>Interdum et malesuada fames ac ante ipsum</p>
			</div>
			<div class="text-center owl-carousel owl-theme mt-5">
				@foreach($testimonials as $key => $value)
					<div class="item text-white">
						<div class="testi-content">
							<div class="testi-description">
								<h3>{{$value->description}}</h3>
							</div>
						</div>
						<div class="reviewed-by mt-5">
							<h4>{{$value->name}}</h4>
							<p>{{$value->brand}}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Testimonials Section -->
	<!-- Footer Section -->
	<section class="footer-sec py-5">
		<div>
			<div class="container-fluid">
				<div class="row pb-5 subfoot">
					<div class="col-md-6">
						<div class="subfoot-links">
							<h4 class="font-weight-normal">
								<a href="#" class="text-white">Terms of Service</a>&nbsp;&nbsp;<span class="text-white">|</span>&nbsp;
								<a href="#" class="text-white">Privacy Policy</a>
							</h4>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-3">
						<h4 class="text-white mb-4">About</h4>
						<ul class="p-0">
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">About Us</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Become Seller</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Jobs on Freeio</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Pricing</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Services Freeio</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Terms of Service</p>
							</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4 class="text-white mb-4">Categories</h4>
						<ul class="p-0">
							<?php $i = 1; ?>
							@foreach($categories_designers as $key => $value)
								<li class="list-unstyled mb-3">
									<a href="{{ route('front.category', ['category' => $value->name]) }}" class="text-light" style="opacity: 0.7;">
										<p class="m-0">{{$value->name}}</p>
									</a>
								</li>
								<?php if ($i >= 6) {
									break;
								}else{
									$i++;
								} ?>
							@endforeach

							@foreach($categories_vendors as $key => $value)
								<li class="list-unstyled mb-3">
									<a href="{{ route('front.category', ['category' => $value->name]) }}" class="text-light" style="opacity: 0.7;">
										<p class="m-0">{{$value->name}}</p>
									</a>
								</li>
								<?php if ($i >= 6) {
									break;
								}else{
									$i++;
								} ?>
							@endforeach
						</ul>
					</div>
					<div class="col-md-3">
						<h4 class="text-white mb-4">Support</h4>
						<ul class="p-0">
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Help & Support</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">FAQ Freeio</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Contact Us</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Services</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Terms of Service</p>
							</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4 class="text-white mb-4">Subscribe</h4>
						<h4 class="text-white mt-5 mb-4">Apps</h4>
						<ul class="p-0">
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">iOS App</p>
							</a></li>
							<li class="list-unstyled mb-3">
								<a href="#" class="text-light" style="opacity: 0.7;"><p class="m-0">Android App</p>
							</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer Section -->


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script type="text/javascript">
		
		document.addEventListener("DOMContentLoaded", function() {
		  const groups = document.querySelectorAll('.heading-group');
		  let current = 0;

		  function showGroup(index) {
		    if(index < groups.length) {
		      groups.forEach((g, i) => {
		        if(i === index) {
		          g.style.display = 'block'; // Show the current group
		          setTimeout(() => {
		            g.querySelector('p').classList.add('show'); // Show paragraph after typewriter effect
		          }, 4000); // Adjust based on typewriter animation duration
		        } else {
		          g.style.display = 'none'; // Hide other groups
		          g.querySelector('p').classList.remove('show'); // Hide paragraph
		        }
		      });
		      setTimeout(() => {
		        showGroup((index + 1) % groups.length); // Move to next group or loop back
		      }, 8000); // Adjust based on how long you want each group to be displayed
		    }
		  }

		  showGroup(current);
		});

		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    autoplay:true,
    		autoplayTimeout:4000,
		    nav:false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        1000:{
		            items:1
		        }
		    }
		})
	</script>
</div>
@endsection