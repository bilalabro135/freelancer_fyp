<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\UserController;
	use App\Http\Controllers\RoleController;
	use App\Http\Controllers\BlogController;
	use App\Http\Controllers\PaymentMethodController;
	use App\Http\Controllers\TestimonialController;
	use App\Http\Controllers\ProjectController;
	use App\Http\Controllers\CategoryController;
	use App\Http\Controllers\PermissionController;
	use App\Http\Controllers\HomeFrontController;

	Auth::routes();

	Route::get('/', function () {
		if(Auth::check()) {
			return redirect('/home');
		} else {
			return view('auth.login');
		}
	});

	// BEGIN::frontPage
		Route::get('/', [HomeFrontController::class, 'index']);
		Route::get('front/services', [HomeFrontController::class, 'service'])->name('front.services');
		Route::get('front/blogs', [HomeFrontController::class, 'blog'])->name('front.blogs');
		Route::get('front/category/{category}', [HomeFrontController::class, 'singleCategory'])->name('front.category');
		Route::get('front/blog/{blog}', [HomeFrontController::class, 'singleBlog'])->name('front.blog');
		Route::get('front/service/{service}', [HomeFrontController::class, 'singleService'])->name('front.service');

	// 

	// PDF generator
	Route::get('generate-pdf/all', [ChallanController::class, 'generatePDF']);

	// Route::get('send_otp/{contact_no}/{code}', [TwilioSMSController::class, 'index']);

	// Route::get('/send_sms/{contact_no}',[App\Http\Controllers\NotificationController::class, 'send_sms']);

	Route::group(['middleware' => ['auth']], function() {
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	// BEGIN::Jobs
		Route::resource('/jobs', ProjectController::class);
		Route::get('/lst_jobs', [ProjectController::class, 'list']);
		Route::get('/applicant/{id}', [ProjectController::class, 'applicant_list'])->name('applicant');
		Route::delete('/del_job', [ProjectController::class, 'destroy']);
	// END::Jobs

	// Appy for job
		Route::get('front/service/{service}/apply', [HomeFrontController::class, 'applyJob'])->name('front.service.apply');
	// Appy for job

	// BEGIN::Category
		Route::resource('/categories', CategoryController::class);
		Route::get('/lst_category', [CategoryController::class, 'list']);
		Route::delete('/del_category', [CategoryController::class, 'destroy']);
		// Route::get('/pay_fee', [ChallanController::class, 'show_fee_pay']);
	// END::Category

	// BEGIN::Job Type
		Route::resource('/testimonials', TestimonialController::class);
		Route::get('/lst_testimonials', [TestimonialController::class, 'list']);
		Route::delete('/del_testimonials', [TestimonialController::class, 'destroy']);
		// Route::get('/pay_fee', [ChallanController::class, 'show_fee_pay']);
	// END::Job Type

	// BEGIN::Category
		Route::resource('/payment-methods', PaymentMethodController::class);
		Route::get('/lst_payment_method', [PaymentMethodController::class, 'list']);
		Route::delete('/del_payment_method', [PaymentMethodController::class, 'destroy']);
		// Route::get('/pay_fee', [ChallanController::class, 'show_fee_pay']);
	// END::Category

	// BEGIN::Category
		Route::resource('/blogs', BlogController::class);
		Route::get('/lst_blogs', [BlogController::class, 'list']);
		Route::delete('/del_blogs', [BlogController::class, 'destroy']);
		// Route::get('/pay_fee', [ChallanController::class, 'show_fee_pay']);
	// END::Category

	// BEGIN::users
		Route::resource('/users', UserController::class);
		Route::get('/lst_user', [UserController::class, 'list']);
		Route::delete('/del_user', [UserController::class, 'destroy']);
	// END::users

	// BEGIN::roles
		Route::resource('/roles', RoleController::class);
		Route::get('/lst_role', [RoleController::class, 'list']);
		Route::delete('/del_role', [RoleController::class, 'destroy']);
	// END::roles

	// BEGIN::permissions
		// Route::resource('/permissions', PermissionController::class);
		// Route::get('/lst_permission', [PermissionController::class, 'list']);
		// Route::delete('/del_permission', [PermissionController::class, 'destroy']);
	// END::permissions



});


