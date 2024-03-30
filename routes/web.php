<?php

use App\Http\Controllers\AdminTable;
use App\Http\Controllers\CompanyProfile;
use App\Http\Controllers\EmployeeProfile;
use App\Http\Controllers\NSRP;
use App\Http\Controllers\ProfileController;
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

//JOBSEEKER FILL INFORMATION
Route::get('/fill', [NSRP::class, 'loadData'])->name('fill_profile');
Route::post('/fill', [NSRP::class, 'storeInfo'])->name('postInfo');

//EMPLOYER FILL INFORMATION
Route::get('/fill/employer', [NSRP::class, 'loadEmployer'])->name('fill_employer');
Route::post('/fill/employer', [NSRP::class, 'postEmployer'])->name('postEmployer');

//PESO ADMIN ADD
Route::post('/admin/add', [AdminTable::class, 'addData'])->name('addDataAdmin');
Route::post('/admin/addPeso', [AdminTable::class, 'addPeso'])->name('addPesoAdmin');


//ADMIN LOGIN REDIRECT
Route::get('/admin', [AdminTable::class, 'index'])->name('admintables');

//JOBSEEKER PROFILE
Route::get('/employee', [EmployeeProfile::class, 'employeeProfile'])->name('employeeProfile');
Route::post('/employee/update', [EmployeeProfile::class, 'updateDescEmp'])->name('updateDescEmp');

//EMPLOYER PROFILE
Route::get('/company', [CompanyProfile::class, 'companyProfile'])->name('companyProfile');
Route::post('/company/update', [CompanyProfile::class, 'updateDescCompany'])->name('updateDescCompany');


//LARAVEL DEFAULT ROUTES
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
