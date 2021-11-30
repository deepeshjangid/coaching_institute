<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//for admin
Route::get('/migrate', function(){
    \Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));
    dd('migrated!');
});

Route::view('/admin', 'admin.login');
Route::post('/admin-login', 'Admin\AdminController@login')->name('admin');

Route::group(['prefix'=>'admin','middleware' => 'admin'], function () {
	Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');	
	Route::get('/logout', 'Admin\AdminController@logout')->name('admin.logout');
	Route::match(['get','post'],'/change-password', 'Admin\AdminController@changepassword')->name('admin.changepassword');

	Route::group(['prefix'=>'user'],function() {
		Route::get('/delete/{id}', 'Admin\UserController@Destroy');
		Route::post('/change-status', 'Admin\UserController@ChangeStatus');
		Route::post('/admin-verify', 'Admin\UserController@AdminVerify');
    });

	Route::group(['prefix'=>'users'],function() {
		Route::get('/', 'Admin\UserController@Users')->name('admin.users');
		Route::get('/students', 'Admin\UserController@Students')->name('admin.students');
		Route::get('/tutors', 'Admin\UserController@Tutors')->name('admin.tutors');
		Route::get('/institutes', 'Admin\UserController@Institutes')->name('admin.institutes');
	});

	Route::group(['prefix'=>'forms'],function() {
		Route::get('/student', 'Admin\UserController@StudentForms')->name('admin.student.forms');
		Route::get('/tutor', 'Admin\UserController@TutorForms')->name('admin.tutor.forms');
		Route::get('/institute', 'Admin\UserController@InstituteForms')->name('admin.institute.forms');
	});

	Route::group(['prefix'=>'testimonial'],function() {
		Route::match(['get','post'],'add', 'Admin\TestimonialController@index')->name('admin.testimonial.add');
		Route::get('/list', 'Admin\TestimonialController@show')->name('admin.testimonial.list');
		Route::get('/update/{id}', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
		Route::get('/delete/{id}', 'Admin\TestimonialController@destroy')->name('admin.testimonial.delete');
		Route::post('change-status','Admin\TestimonialController@changeStatus')->name('admin.testimonial.changestatus');
	});

	Route::group(['prefix'=>'subscription-plan'],function() {
		Route::match(['get','post'],'add', 'Admin\SubscriptionPlanController@index')->name('admin.subscriptionplan.add');
		Route::get('/list/{user_type}', 'Admin\SubscriptionPlanController@show')->name('admin.subscriptionplan.list');
		Route::get('purchage-plans', 'Admin\SubscriptionPlanController@PurchagePlan')->name('admin.purchageplans.list');
		Route::get('/update/{id}', 'Admin\SubscriptionPlanController@update')->name('admin.subscriptionplan.update');
		Route::get('/delete/{id}', 'Admin\SubscriptionPlanController@destroy')->name('admin.subscriptionplan.delete');
		Route::post('change-status','Admin\SubscriptionPlanController@changeStatus')->name('admin.subscriptionplan.changestatus');
	});

	Route::group(['prefix'=>'course-category'],function() {
		Route::match(['get','post'],'add', 'Admin\CategoryController@index')->name('admin.course.category.add');
		Route::get('/list', 'Admin\CategoryController@show')->name('admin.course.category.list');
		Route::get('/update/{id}', 'Admin\CategoryController@update')->name('admin.course.category.update');
		Route::get('/delete/{id}', 'Admin\CategoryController@destroy')->name('admin.course.category.delete');
		Route::post('change-status','Admin\CategoryController@changeStatus')->name('admin.course.category.changestatus');
	});

	Route::group(['prefix'=>'course-sub-category'],function() {
		Route::match(['get','post'],'add', 'Admin\SubCategoryController@index')->name('admin.course.sub.category.add');
		Route::get('/list', 'Admin\SubCategoryController@show')->name('admin.course.sub.category.list');
		Route::get('/update/{id}', 'Admin\SubCategoryController@update')->name('admin.course.sub.category.update');
		Route::get('/delete/{id}', 'Admin\SubCategoryController@destroy')->name('admin.course.sub.category.delete');
		Route::post('change-status','Admin\SubCategoryController@changeStatus')->name('admin.course.sub.category.changestatus');
	});

	Route::group(['prefix'=>'course'],function() {
		Route::match(['get','post'],'add', 'Admin\CourseController@index')->name('admin.course.add');
		Route::get('/list', 'Admin\CourseController@show')->name('admin.course.list');
		Route::get('/update/{id}', 'Admin\CourseController@update')->name('admin.course.update');
		Route::get('/delete/{id}', 'Admin\CourseController@destroy')->name('admin.course.delete');
		Route::post('change-status','Admin\CourseController@changeStatus')->name('admin.course.changestatus');
		Route::post('get','Admin\CourseController@Get')->name('admin.course.get');
	});

	Route::group(['prefix'=>'contact-us'],function() {
		Route::match(['get','post'],'add', 'Admin\ContactUsController@index')->name('admin.contact.add');
		Route::get('/list', 'Admin\ContactUsController@show')->name('admin.contact.list');
		Route::get('/delete/{id}', 'Admin\ContactUsController@destroy')->name('admin.contact.delete');
	});


});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('/register', 'HomeController@Register')->name('register');
Route::post('/get-sub-category', 'HomeController@GetSubCategory')->name('get.sub.category');
Route::post('/get-course', 'HomeController@GetCourse')->name('get.course');
Route::post('/register-submit', 'HomeController@RegisterSubmit')->name('register.submit');

Route::view('/login', 'login')->name('login');
Route::post('/login-submit', 'HomeController@Login')->name('login.submit');

Route::view('/student-form', 'student.student-form')->name('student.form');
Route::post('/student-form-submit', 'HomeController@StudentForm')->name('student.form.submit');

Route::view('/tutor-form', 'tutor.tutor-form')->name('tutor.form');
Route::post('/tutor-form-submit', 'HomeController@TutorForm')->name('tutor.form.submit');

Route::view('/institute-form', 'institute.institute-form')->name('institute.form');
Route::post('/institute-form-submit', 'HomeController@InstituteForm')->name('institute.form.submit');

Route::get('/subscription-plan', 'HomeController@SubscriptionPlan')->name('subscription.plan');

Route::view('/about', 'about')->name('about');

Route::get('/contact-us', 'HomeController@ContactUs')->name('contact');
Route::post('/contact-submit', 'HomeController@ContactUsSubmit')->name('contact.submit');

Route::group(['middleware' => 'Userauth'], function () {

	Route::match(['get','post'],'student-profile', 'StudentController@Profile')->name('student.profile');
	Route::match(['get','post'],'tutor-profile', 'TutorController@Profile')->name('tutor.profile');
	Route::match(['get','post'],'institute-profile', 'InstituteController@Profile')->name('institute.profile');

	Route::post('/plan-purchage','HomeController@PlanPurchage')->name('plan.purchage');
	Route::post('payment', 'PaymentController@Payment')->name('make.payment');

});

Route::get('/logout', 'HomeController@Logout')->name('logout');
