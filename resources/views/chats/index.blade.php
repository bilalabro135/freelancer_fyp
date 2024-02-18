@extends('layouts.main')
@section('title','Chat')
@section('content')
	
	<div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
			<div class="col-md-12">

				@if(count($chats) > 0)
					<section class="card mt-4">
						<div class="list-group list-group-messages list-group-flush">
							@foreach($chats as $key => $value)
								<div class="list-group-item unread">
									<div class="list-group-item-figure">
										<a href="conversations.html" class="user-avatar">
											<div class="avatar avatar-online">
												@if($value->sender_image)
			                                        <img src="{{asset('uploads/'.$value->sender_image)}}" style="border-radius: 50px; width: 40px;">
			                                    @else
			                                        <img src="{{asset('uploads/no_image.png')}}" style="border-radius: 50px; width: 40px;">
			                                    @endif
											</div>
										</a>
									</div>
									<div class="list-group-item-body pl-3 pl-md-4">
										<div class="row">
											<div class="col-12 col-lg-10">
												<h4 class="list-group-item-title">
													<a href="{{route('chat',['user_id' => $value->from_user_id == Auth::id() ? $value->to_user_id : $value->from_user_id])}}">{{$value->sender_name}}</a>
												</h4>
												<p class="list-group-item-text text-truncate"><?php echo $value->read_status == 0 ? '<h3 class="font-weight-bold text-truncate">'.$value->message.'</h3>' : $value->message ?></p>
											</div>
											<div class="col-12 col-lg-2 text-lg-right">
												<p class="list-group-item-text"> {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }} </p>
											</div>
										</div>
									</div>
									<div class="list-group-item-figure">
										<div class="dropdown">
											<button class="btn-dropdown" data-toggle="dropdown">
												<i class="fa fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-arrow"></div>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item">Mark as read</a>
												<a href="#" class="dropdown-item">Mark as unread</a>
												<a href="#" class="dropdown-item">Toggle star</a>
												<a href="#" class="dropdown-item">Trash</a>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					@else
					<section class="card mt-4" style="height: 40vh;">
						<h2 class="text-center" style="position: absolute; left: 0; right: 0; bottom: 0; top: 50%;">Your chat box is empty..!!</h2>
					</section>
				@endif
				
			</div>
		</div>
    </div>

@endsection