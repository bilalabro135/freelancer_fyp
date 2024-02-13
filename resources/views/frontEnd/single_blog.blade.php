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
	.blogs-sec{
		padding: 200px 0 100px 0;
	}
	.blogs .col-md-12 img{
		width: 100%;
		height: 500px;
		border-radius: 20px;
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
</style>
<div class="home-page">

	<!-- Services Section -->
	<section class="blogs-sec pb-0">
		<div class="container">
			<div class="blogs-head">
				<h2>{{$blog->title}}</h2>
				<div class="blog-by d-flex">
					<p class="mt-4">
						@if(isset($user->profile_pic))
							<img width="100%" src="{{asset('uploads/'.$user->profile_pic)}}">
						@else
							<img width="100%" src="{{asset('uploads/no_image.png')}}">
						@endif
						&nbsp;<span>{{$user->name}}</span> &nbsp;|&nbsp;
						<span>{{date('M,d,Y',strtotime($blog->created_at))}}</span>
					</p>
				</div>
				<hr class="mr-4 my-4">
			</div>
			<div class="blogs mt-5">
				<div class="row">
					<div class="col-md-12">
						<img src="{{asset('uploads/'.$blog->blog_image)}}">
					</div>
					<div class="col-12 p-5">
						{!! ($blog->description) !!}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section -->

	<!-- Services Section -->
	<section class="related-sec py-5 mt-5">
		<div class="container">
			<div class="services-head">
				<h2>Related Posts</h2>
				<hr class="mr-4 my-4">
			</div>
			<div class="services mt-5">
				<div class="row">
					@foreach($blogs as $key => $value)
						<div class="col-md-3">
							<div class="blog-wrapper">
								<div class="blog-img">
									<img width="100%" src="{{ asset('/uploads/'.$value->blog_image) }}">
								</div>
								<div class="blog-content">
									<p>{{date('M,d,Y',strtotime($value->created_at))}}</p>
									<h4><a href="{{ route('front.blog', ['blog' => $value->title]) }}">{{$value->title}}</a></h4>
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