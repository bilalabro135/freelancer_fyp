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
		padding: 10px 0;
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
	.pagination{
		justify-content: center;
	}
	.blogs .col-md-12 img{
		width: 100%;
		height: 500px;
		border-radius: 6px;
		object-fit: cover;
	}
	.blog-by img{
		width: 40px;
		height: 38px;
		border-radius: 50px;
	}
	.related-sec{
		background-color: #F1FCFA;
	}
	.banner-sec{
		background-image: url('{{ asset("uploads/service-detail.jpg") }}');
		background-position: center center;
		background-repeat: no-repeat;
		padding: 200px 0 50px 0;
	}
	.pricing-area{
		border: 1px solid #E9E9E9;
		padding: 20px 20px;
		box-shadow: 0 6px 15px 0 rgba(64, 79, 104, 0.05);
		border-radius: 6px;
	}
	.pricing-area button, .pricing-area a{
		background-color: #5bbb7b;
		width: 100%;
		color: #fff;
		font-size: 17px;
		font-family: inherit !important;
		border-radius: 10px !important;
	}
</style>
<div class="home-page">
	<!-- Banner Section -->
	<section class="banner-sec bg-color-theme">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-md-12">
					<div class="banner-main">
						<h1 style="font-size: 35px; color: #fff; font-weight: 600;"><b>{{$job->job_title}}</b></h1>
						<div class="blog-by d-flex">
							<p class="mt-4 text-white">
								@if(isset($user->profile_pic))
									<img width="100%" src="{{asset('uploads/'.$user->profile_pic)}}">
								@else
									<img width="100%" src="{{asset('uploads/no_image.png')}}">
								@endif
								&nbsp;<span>{{$user->name}}</span> &nbsp;|&nbsp;
								<span>{{date('M,d,Y',strtotime($job->created_at))}}</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Banner Section -->

	<!-- Services Section -->
	<section class="blogs-sec pb-0 mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="blogs-head">
						<div class="simple-det row align-items-center text-white">
							<div class="d-flex col-md-3" style="gap: 30px;">
								<i class="text-white fa fa-regular fa-calendar-check"></i>
								<div>
									<p class="m-0">Delivery Time</p>
									<p class="m-0">{{$job->delivery_time}} Days</p>
								</div>
							</div>
							<div class="d-flex col-md-3" style="gap: 30px;">
								<i class="text-white fa fa-map-marker" aria-hidden="true"></i>
								<div>
									<p class="m-0">Location</p>
									<p class="m-0">{{$job->location}}</p>
								</div>
							</div>
							<div class="d-flex col-md-4" style="gap: 30px;">
								<i class="fa fa-download" aria-hidden="true"></i>
								<div>
									<p class="m-0">Project File</p>
									<p><a href="{{asset('uploads/'.$job->project_file)}}">Download here</a></p>
								</div>
							</div>
						</div>
						<hr class="mr-4 my-4">
					</div>
					<div class="blogs mt-5">
						<div class="row">
							<div class="col-md-12">
								<img src="{{asset('uploads/'.$job->job_image)}}">
							</div>
							<div class="col-12 p-5 text-white">
								<h3>Service Description</h3>
								<hr class="mr-4 my-4">
								{!! ($job->description) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="margin-top: 128px;">
					<div class="pricing-area text-white">
						<h3>PKR {{$job->price}}</h3>
						<div>
							<hr class="mr-4 my-4">
							<h4>About the seller</h4>
							<div class="d-flex my-5" style="gap: 10px;">
								@if($user->profile_pic)
									<img src="{{asset('uploads/'.$user->profile_pic)}}" style="width: 60px;border-radius: 30px;">
								@else
									<img src="{{asset('uploads/no_image.png')}}" style="width: 60px;border-radius: 30px;">
								@endif
								<p>{{$user->name}}</p>
							</div>
							<hr class="mr-4 my-4">
						</div>
						@if(isset(Auth::user()->id))
							<a href="{{ route('front.service.apply', ['service' => $job->job_title]) }}" class="text-white btn bg-color-theme text-center">Apply Now {{$job->price}} PKR</a>
						@else
							<button class="text-white bg-color-theme btn text-center">Apply Now {{$job->price}} PKR</button>
							<p class="text-center mt-4 text-danger">Please login to apply for this job</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section -->

	<!-- Services Section -->
	<section class="related-sec bg-color-theme py-5 mt-5">
		<div class="container">
			<div class="services-head text-white">
				<h2>Related Jobs</h2>
				<hr class="mr-4 my-4">
			</div>
			<div class="services mt-5">
				<div class="row">
					@foreach($jobs as $key => $value)
						<div class="col-md-3">
							<div class="blog-wrapper">
								<div class="blog-img">
									<img width="100%" src="{{ asset('/uploads/'.$value->job_image) }}">
								</div>
								<div class="blog-content text-white">
									<p>{{date('M,d,Y',strtotime($value->created_at))}}</p>
									<h4><a href="{{ route('front.service', ['service' => $value->job_title]) }}">{{$value->job_title}}</a></h4>
									<p>{!! Str::limit($value->description, 100) !!}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section -->

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

</div>
@endsection