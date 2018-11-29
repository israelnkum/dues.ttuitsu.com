<?php

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
Route::get('/',function(){
    return view('auth.admin-login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin-dashboard');

    //password resets
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //show both admin and super list
    Route::get('/allAdmin','AdminController@allAdmin')->name('admin.all');

    //show new Admin Form
    Route::get('/newAdmin','AdminController@newAdmin')->name('admin.new');
    //show new superAdmin Form
    Route::get('/newSuperAdmin','AdminController@newSuperAdmin')->name('super.admin.new');

    //update Super Admin Info
    Route::post('/superAdminUpdate','AdminController@updateSuperAdminInfo')->name('superAdmin.update');

    //insert new superAdmin
    Route::post('/superAdminStore','AdminController@storeSuperAdmin')->name('superAdmin.store');

    //insert new Admin
    Route::post('/adminStore','AdminController@storeAdmin')->name('Admin.store');

    //update Admin Info
    Route::post('/updateAdminInfo','HomeController@updateAdminInfo');


    Route::get('/updateSuperAdminForm','AdminController@showSuperAdminUpdateForm')->name('super.admin.update');
    Route::get('/updateAdminForm','HomeController@showAdminUpdateForm')->name('admin.update');
    //showSuperAdminDetail
    Route::get('/getAdminDetails/{id}/{userType}','AdminController@showAdminDetails')->name('admin.showDetails');

    //delete Admin or Super Admin
    Route::delete('/deleteAdmin/{id}/{userType}','AdminController@deleteAdmin')->name('admin.deleteAdmin');

});


Route::group(['middleware' => 'web'], function () {
//Student Routes
Route::resource('student','StudentController');

//PaymentLog Routes
Route::resource('paymentLog','PaymentLogController');

//Payment Routes
Route::resource('payment','PaymentController');

//Upload Route
Route::resource('studentUpload','UploadController');


//DuesPreference Route
Route::resource('duesPreference','DuesPreference');

//DuesPreference Route
    Route::resource('register','RegistrationController');



//Reverse Payment Route
    Route::resource('reversePayment', 'ReversePayment');
});

//levels Route
Route::resource('levels','LevelController');

Route::POST('/updateLevel','LevelController@updateLevel')->name('updateLevel');


//Souvenir Route
Route::resource('souvenir','SouvenirController');

Route::get('/print/{id}/','PaymentController@generateReceipt')->name('print');

