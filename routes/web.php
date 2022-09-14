<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SubDistrictController;
use App\Http\Controllers\DefaultController;

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


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');


});

// Division All Route
Route::controller(DivisionController::class)->group(function () {
    Route::get('/division/add', 'addDivision')->name('add.division');
    Route::post('/division/insert', 'insertDivision')->name('insert.division');
    Route::get('/division/edit/{id}','editDivision')->name('edit.division');
    Route::post('/division/update/','updateDivision')->name('update.division');
    Route::get('/division/delete/{id}','deleteDivision')->name('delete.division');
    Route::get('/division/all', 'viewAllDivision')->name('view.divisions');



});

// District All Route
Route::controller(DistrictController::class)->group(function () {
    Route::get('/district/add', 'addDistrict')->name('add.district');
    Route::post('/district/insert', 'insertDistrict')->name('insert.district');
    Route::get('/district/edit/{id}','editDistrict')->name('edit.district');
    Route::post('/district/update/','updateDistrict')->name('update.district');
    Route::get('/district/delete/{id}','deleteDistrict')->name('delete.district');
    Route::get('/district/all', 'viewAllDistrict')->name('view.districts');



});


// Sub District All Route

Route::controller(SubDistrictController::class)->group(function () {
    Route::get('/subdistrict/add', 'addSubDistrict')->name('add.subdistrict');
    Route::post('/subdistrict/insert', 'insertSubDistrict')->name('insert.subdistrict');
    Route::get('/subdistrict/edit','editSubDistrict')->name('edit.subdistrict');
    //Route::post('/subdistrict/update/','updateSubDistrict')->name('update.subdistrict');
    Route::get('/subdistrict/delete/{id}','deleteSubDistrict')->name('delete.subdistrict');
    Route::get('/subdistrict/all', 'viewAllSubDistrict')->name('view.subdistricts');




});

// Default Controller
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-district', 'getDistrict')->name('get-district-list');




});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
