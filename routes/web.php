<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\UserController;
	use App\Http\Controllers\RoleController;
	use App\Http\Controllers\StudentController;
	use App\Http\Controllers\ChallanController;
	use App\Http\Controllers\PermissionController;

	Auth::routes();

	Route::get('/', function () {
		if(Auth::check()) {
			return redirect('/home');
		} else {
			return view('auth.login');
		}
	});

	// Route::get('send_otp/{contact_no}/{code}', [TwilioSMSController::class, 'index']);

	// Route::get('/send_sms/{contact_no}',[App\Http\Controllers\NotificationController::class, 'send_sms']);

	Route::group(['middleware' => ['auth']], function() {
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	// BEGIN::Students
		Route::resource('/students', StudentController::class);
		Route::get('/lst_students', [StudentController::class, 'list']);
		Route::delete('/del_student', [StudentController::class, 'destroy']);
	// BEGIN::Students

	// BEGIN::Challan
		Route::resource('/challan', ChallanController::class);
		Route::get('/lst_challan', [ChallanController::class, 'list']);
		Route::post('/pay_challan', [ChallanController::class, 'pay_challan']);
		Route::delete('/del_challan', [ChallanController::class, 'destroy']);
	// BEGIN::Challan

	// BEGIN::users
		Route::resource('/users', UserController::class);
		Route::get('/lst_user', [UserController::class, 'list']);
		Route::delete('/del_user', [UserController::class, 'destroy']);
	// BEGIN::users

	// BEGIN::roles
		Route::resource('/roles', RoleController::class);
		Route::get('/lst_role', [RoleController::class, 'list']);
		Route::delete('/del_role', [RoleController::class, 'destroy']);
	// BEGIN::roles

	// BEGIN::permissions
		// Route::resource('/permissions', PermissionController::class);
		// Route::get('/lst_permission', [PermissionController::class, 'list']);
		// Route::delete('/del_permission', [PermissionController::class, 'destroy']);
	// BEGIN::permissions



});


