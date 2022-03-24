<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['register'=>false]);
Auth::routes();

//_class crud route_//
Route::get('/class',[App\Http\Controllers\Admin\ClassController::class,'index'])->name('class.index');
Route::get('/class/create',[App\Http\Controllers\Admin\ClassController::class,'create'])->name('class.create');
Route::post('/class/store',[App\Http\Controllers\Admin\ClassController::class,'store'])->name('class.store');
Route::get('/class/edit/{id}',[App\Http\Controllers\Admin\ClassController::class,'edit'])->name('class.edit');
Route::post('/class/update/{id}',[App\Http\Controllers\Admin\ClassController::class,'update'])->name('class.update');
Route::get('/class/delete/{id}',[App\Http\Controllers\Admin\ClassController::class,'destroy'])->name('class.delete');

//_student crud route_//
Route::resource('students',StudentController::class);





















//_this route showing verification page_//
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


//_this route for email verification_//
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit/money', [App\Http\Controllers\HomeController::class, 'DepositMoney'])->name('deposit.money')->middleware('verified');
//_this route for email verification send_//
Route::post('/verification/resend', [App\Http\Controllers\HomeController::class, 'VerificationResend'])->name('verification.resend');


Route::get('person/details/{id}', [App\Http\Controllers\HomeController::class, 'PersonDetails'])->name('person.details');

//_password change route_//
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'PasswordChange'])->name('password.change')->middleware('verified');
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'PasswordUpdate'])->name('password.update')->middleware('verified');

