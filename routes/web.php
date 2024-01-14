<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RequisitionsController,
    DashboardController,
    UserController,
    BrandController,
    CalendarController,
    CountryController
};
use App\Models\Session;

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

Route::view('/', 'landing');

Route::post('login', [UserController::class,'login'])->name('login');
Route::get('requisitions', [RequisitionsController::class,'index'])->name('requisitions');
Route::get('logout', [UserController::class,'logout'])->name('logout');
Route::get('singUpForm', [UserController::class,'singUpForm'])->name('singUpForm');
Route::get('recoveryPasswordForm', [UserController::class,'recoveryPasswordForm'])->name('recoveryPasswordForm');
Route::post('singUp', [UserController::class,'singUp'])->name('singUp');
Route::get('user/{id}', [UserController::class,'show'])->name('user');
Route::post('userUpdate', [UserController::class,'update'])->name('userUpdate');
Route::get('requisitionForm', [RequisitionsController::class,'requisitionForm'])->name('requisitionForm');
Route::get('requisitionEditForm/{id}', [RequisitionsController::class,'requisitionEditForm'])->name('requisitionEditForm');
Route::post('requisitionEdit', [RequisitionsController::class,'requisitionEdit'])->name('requisitionEdit');
Route::post('requisitionStore', [RequisitionsController::class,'store'])->name('requisitionStore');
Route::post('searchRequisition', [RequisitionsController::class,'searchRequisition'])->name('searchRequisition');
Route::get('statusUpdateUser', [UserController::class,'statusUpdateUser'])->name('statusUpdateUser');
Route::get('deleteUser', [UserController::class,'deleteUser'])->name('deleteUser');
Route::get('brandForm', [BrandController::class,'BrandForm'])->name('brandForm');
Route::get('requisitionDetail', [RequisitionsController::class,'show'])->name('requisitionDetail');
Route::get('brandsCountry/{country_id}', [BrandController::class,'brandsCountry'])->name('brandsCountry');
Route::get('calendar', [CalendarController::class,'index'])->name('calendar');
Route::resource('dashboard', DashboardController::class);
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('brands', BrandController::class);

Route::get('/searchRequisition', function () {
    return view('searchRequisition');
});
