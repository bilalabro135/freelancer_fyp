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
		background-color: #1F4B3F;
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
	    box-shadow: 0px 0px 7px 0px #c9c9c9;
	    padding: 12px 10px;
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
	.footer-sec{
		background-color: #1F4B3F;
	}
	.subfoot{
		border-bottom: 1px solid #6b717785;
		margin: 0;
	}
</style>
<div class="home-page">
	<!-- Banner Section -->
	<section class="banner-sec" style="padding: 85px 0 0 0;">
		<div class="container-fluid">
			<div class="row justify-content-between align-items-center">
				<div class="col-md-6">
					<div class="banner-main">
						<h1 style="font-size: 45px; color: #1F4B3F; font-weight: 600;">With talented <b style="color: #5bbb7b;">Freelancers</b> and <b style="color: #5bbb7b;">Vendors</b> do more work.</h1>
						<p class="py-4" style="font-size: 16px;">Millions of people use freeio.com to turn their ideas into reality.</p>
						<div style="position: relative;">
							<input placeholder="What are you looking for?" type="text" class="form-control p-5" style="font-size:16px; border-radius: 5px; border: 1px solid #1F4B3F;" name="">
							<button style="position: absolute; top: 0; right: 0; bottom: 0; color: #fff; padding: 30px 30px; background-color: #1F4B3F; font-size: 16px; border-bottom-right-radius: 5px;border-top-right-radius: 5px;" class="btn">Search</button>
						</div>
						<div>
							<p style="font-size: 16px;" class="py-4">Popular Searches : Designer, Developer, Web, IOS, PHP, Senior, Engineer</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="banner-img">
						<img width="100%" src="{{ asset('/uploads/clientsFreelancers.png') }}">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Banner Section -->

	<!-- Offer Section -->
	<section class="offer-sec">
		<div class="container-fluid">
			<div class="head mb-5">
				<h2>Need something done?</h2>
				<p>Most viewed and all-time top-selling services</p>
			</div>
			<div class="row">
				<div class="col-md-3">
					<i class="fa fa-file" aria-hidden="true"></i>
					<h3>Post a job</h3>
					<p>It’s free and easy to post a job. Simply fill in a title, description.</p>
				</div>
				<div class="col-md-3">
					<i class="fa fa-users" aria-hidden="true"></i>
					<h3>Choose freelancers</h3>
					<p>It’s free and easy to post a job. Simply fill in a title, description.</p>
				</div>
				<div class="col-md-3">
					<i class="fas fa-money-check-alt"></i>
					<h3>Pay safely</h3>
					<p>It’s free and easy to post a job. Simply fill in a title, description.</p>
				</div>
				<div class="col-md-3">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<h3>We’re here to help</h3>
					<p>It’s free and easy to post a job. Simply fill in a title, description.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Offer Section -->

	<!-- Category Section -->
	<section class="category-sec" style="margin-top: 70px;">
		<div class="container-fluid">
			<div class="categories-head">
				<h2>Browse talent by category</h2>
				<p>Get some Inspirations from 100+ skills</p>
			</div>
			<div class="categories mt-5">
				<div class="row">
					@foreach($categories as $key => $value)
						<div class="col-md-3 mb-5 ">
							<div class="category-block">
								<a href="#">
									<h4>{{$value->name}}</h4>
									<p>{{$value->projects_count}} Services</p>
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
			<div class="services-head">
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
								<div class="col-md-6">
									<p>{{$value->category_name}}</p>
									<h4><a href="#">{{$value->job_title}}</a></h4>
									<hr class="mr-4 my-2">
									{!! Str::limit($value->description, 60) !!}
									<hr class="mr-4 my-2">
									<span><a href="#">{{$value->creator}}</a> Starting at: {{'PKR'.$value->price}}</span>
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

	<!-- Blogs Section -->
	<section class="blog-sec">
		<div class="container-fluid">
			<div class="blogs-head">
				<h2>Our Blog</h2>
				<p>See how you can up your career status</p>
			</div>
			<div class="row mt-5">
				@foreach($blogs as $key => $value)
					<div class="col-md-3">
						<div class="blog-wrapper">
							<div class="blog-img">
								<img width="100%" src="{{ asset('/uploads/'.$value->blog_image) }}">
							</div>
							<div class="blog-content">
								<p>{{date('M,d,Y',strtotime($value->created_at))}}</p>
								<h4><a href="#">{{$value->title}}</a></h4>
								<p>{!! Str::limit($value->description, 100) !!}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Blogs Section -->
	<!-- Testimonials Section -->
	<section class="testimonials-sec mt-5">
		<div class="container-fluid">
			<div class="testi-head text-center">
				<h2>Testimonials</h2>
				<p>Interdum et malesuada fames ac ante ipsum</p>
			</div>
			<div class="text-center owl-carousel owl-theme mt-5">
				@foreach($testimonials as $key => $value)
					<div class="item">
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
	<section class="footer-sec mt-5 py-5">
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
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Design & Creative</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Development & IT</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Music & Audio</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Programming & Tech</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Digital Marketing</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Finance & Accounting</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Writing & Translation</p>
							</a></li>
							<li class="list-unstyled mb-3"><a href="#" class="text-light" style="opacity: 0.7;">
								<p class="m-0">Trending</p>
							</a></li>
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