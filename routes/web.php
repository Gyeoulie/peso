<?php

use App\Http\Controllers\AdminTable;
use App\Http\Controllers\CompanyProfile;
use App\Http\Controllers\EmployeeProfile;
use App\Http\Controllers\FillProfileController;
use App\Http\Controllers\NSRP;
use App\Http\Controllers\ProfileController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/fill', function () {
//     return view('fill.fill_profile');
// })->name('fill_profile');

Route::get('/fill', [NSRP::class, 'loadData'])->name('fill_profile');
Route::get('/fill/employer', [NSRP::class, 'loadEmployer'])->name('fill_employer');

Route::post('/fill', [NSRP::class, 'storeInfo'])->name('postInfo');
Route::post('/fill/employer', [NSRP::class, 'postEmployer'])->name('postEmployer');


Route::post('/admin/add', [AdminTable::class, 'addData'])->name('addDataAdmin');
Route::post('/admin/addPeso', [AdminTable::class, 'addPeso'])->name('addPesoAdmin');


Route::get('/admin', [AdminTable::class, 'index'])->name('admintables');


// Route::get('/admin', function () {
//     return view('admin.tables');
// })->name('admintables');

Route::get('/employee', [EmployeeProfile::class, 'employeeProfile'])->name('employeeProfile');
Route::get('/company', [CompanyProfile::class, 'companyProfile'])->name('companyProfile');
Route::post('/employee/update', [EmployeeProfile::class, 'updateDescEmp'])->name('updateDescEmp');
Route::post('/company/update', [CompanyProfile::class, 'updateDescCompany'])->name('updateDescCompany');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/fillpro', [FillProfileController::class, 'store'])->name('fillReg');


// Define routes
Route::get('/fetch-municipalities/{province}', [NSRP::class, 'fetchMunicipalities']);
Route::get('/fetch-barangays/{municipality}', [NSRP::class, 'fetchBarangays']);



require __DIR__ . '/auth.php';
