<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SubDistrictController;
use App\Http\Controllers\GeneralSettingController;
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


// Property All Route
Route::controller(PropertyController::class)->group(function () {
    Route::get('/property/add', 'addProperty')->name('add.property');
    Route::post('/property/insert', 'insertProperty')->name('insert.property');
    Route::get('/property/item/{id}', 'viewSingleProperty')->name('view.single.property');
    Route::get('/property/edit/{id}','editProperty')->name('edit.property');
    Route::post('/property/update/','updateProperty')->name('update.property');
    Route::get('/property/delete/{id}','deleteProperty')->name('delete.property');
    Route::get('/property/all', 'viewAllProperty')->name('view.property');

    Route::post('/property-category/insert', 'insertPropertyCategory')->name('insert.property.category');
    Route::get('/get-property-category/edit/{id}', 'editPropertyCategory')->name('edit.property.category'); // ajax
    Route::post('/property-category/update/','updatePropertyCategory')->name('update.property.category');
    Route::get('/property-category/delete/{id}','deletePropertyCategory')->name('delete.property.category');
    Route::get('/property-category/all', 'viewPropertyCategory')->name('view.property.category');


});


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/{id}', 'editProfile')->name('admin.edit.profile');
    Route::post('/admin/update/', 'updateProfile')->name('admin.update.profile');

    Route::get('/admin/property/add/', 'addPropertyByUser')->name('admin.add.property.by.user');
    Route::post('/admin/property/insert/', 'insertPropertyByUser')->name('insert.property.by.user');

    Route::get('/admin/users/add', 'addUser')->name('admin.add.user');
    Route::post('/admin/user/insert', 'insertUser')->name('insert.user');
    Route::get('/admin/users/{id}', 'viewSingleUser')->name('admin.view.single.user');
    Route::get('/admin/users/edit/{id}', 'editSingleUser')->name('admin.edit.single.user');
    Route::post('/admin/users/update/', 'updateSingleUser')->name('admin.update.single.user');
    Route::get('/admin/users/', 'viewAllUser')->name('admin.view.all.user');

});

// Division All Route
Route::controller(DivisionController::class)->group(function () {
    Route::post('/division/insert', 'insertDivision')->name('insert.division');
    Route::get('/division/edit/{id}','editDivision')->name('edit.division');
    Route::post('/division/update/','updateDivision')->name('update.division');
    Route::get('/division/delete/{id}','deleteDivision')->name('delete.division');
    Route::get('/division/all', 'viewAllDivision')->name('view.divisions');



});

// District All Route
Route::controller(DistrictController::class)->group(function () {
    Route::post('/district/insert', 'insertDistrict')->name('insert.district');
    Route::get('/district/edit/{id}','editDistrict')->name('edit.district');
    Route::post('/district/update/','updateDistrict')->name('update.district');
    Route::get('/district/delete/{id}','deleteDistrict')->name('delete.district');
    Route::get('/district/all', 'viewAllDistrict')->name('view.districts');



});


// Sub District All Route

Route::controller(SubDistrictController::class)->group(function () {
    Route::post('/subdistrict/insert', 'insertSubDistrict')->name('insert.subdistrict');
    Route::get('/subdistrict/edit/{id}','editSubDistrict')->name('edit.subdistrict');
    Route::post('/subdistrict/update/','updateSubDistrict')->name('update.subdistrict');
    Route::get('/subdistrict/delete/{id}','deleteSubDistrict')->name('delete.subdistrict');
    Route::get('/subdistrict/all', 'viewAllSubDistrict')->name('view.subdistricts');




});

// Default Controller
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-district', 'getDistrict')->name('get-district-list');
    Route::get('/get-district-another', 'getDistrictAnother')->name('get-district-list-another');
    Route::get('/get-subdistrict', 'getSubDistrict')->name('get-sub-district-list');




});

// Genaral Setting All

Route::controller(GeneralSettingController::class)->group(function () {
    Route::post('/blood-group/insert', 'insertBloodGroup')->name('insert.blood');
    Route::get('/get-blood/edit/{id}', 'editBlood')->name('edit.blood'); // ajax
    Route::post('/blood-group/update/','updateBlood')->name('update.blood');
    Route::get('/blood-group/delete/{id}','deleteBloodGroup')->name('delete.blood');
    Route::get('/blood-group/all', 'viewBloodGroup')->name('view.bloods');

    Route::post('/marital-status/insert', 'insertMarital')->name('insert.marital');
    Route::get('/get-marital-status/edit/{id}', 'editMarital')->name('edit.marital'); // ajax
    Route::post('/marital-status/update/','updateMarital')->name('update.marital');
    Route::get('/marital-status/delete/{id}','deleteMarital')->name('delete.marital');
    Route::get('/marital-status/all', 'viewMarital')->name('view.marital');

    Route::post('/religion/insert', 'insertReligion')->name('insert.religion');
    Route::get('/get-religion/edit/{id}', 'editReligion')->name('edit.religion'); // ajax
    Route::post('/religion/update/','updateReligion')->name('update.religion');
    Route::get('/religion/delete/{id}','deleteReligion')->name('delete.religion');
    Route::get('/religion/all', 'viewReligion')->name('view.religion');

    Route::post('/gender/insert', 'insertGender')->name('insert.gender');
    Route::get('/get-gender/edit/{id}', 'editGender')->name('edit.gender'); // ajax
    Route::post('/gender/update/','updateGender')->name('update.gender');
    Route::get('/gender/delete/{id}','deleteGender')->name('delete.gender');
    Route::get('/gender/all', 'viewGender')->name('view.gender');

    Route::post('/job-industry/insert', 'insertJobIndustry')->name('insert.jobindustry');
    Route::get('/get-job-industry/edit/{id}', 'editJobIndustry')->name('edit.jobindustry'); // ajax
    Route::post('/job-industry/update/','updateJobIndustry')->name('update.jobindustry');
    Route::get('/job-industry/delete/{id}','deleteJobIndustry')->name('delete.jobindustry');
    Route::get('/job-industry/all', 'viewJobIndustry')->name('view.jobindustry');



});

Route::get('/phpinfo', function() {
    return phpinfo();
});


Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
