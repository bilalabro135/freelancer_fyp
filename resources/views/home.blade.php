@extends('layouts.main')
@section('title','Dashboard')
	@section('content')
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">@yield('title')</h4>
						
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-primary bubble-shadow-small">
													<i class="fas fa-users"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">Total students</p>
													<h4 class="card-title">{{ $students_count}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-info bubble-shadow-small">
													<i class="far fa-newspaper"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">Total fee</p>
													<h4 class="card-title">{{ $fee_sum}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection