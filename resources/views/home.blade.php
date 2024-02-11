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
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-primary bubble-shadow-small">
													<i class="fas fa-project-diagram"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<h3 class="card-category">Projects done</h3>
													<h4 class="card-title">0</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-success bubble-shadow-small">
													<i class="fas fa-clock" aria-hidden="true"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<h3 class="card-category">Projects pending</h3>
													<h4 class="card-title">0</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-info bubble-shadow-small">
													<i class="fas fa-user"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<h3 class="card-category">Your account</h3>
													<h4 class="card-title">0</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-secondary bubble-shadow-small">
													<i class="fa fa-tasks" aria-hidden="true"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<h3 class="card-category">Your projects</h3>
													<h4 class="card-title">0</h4>
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