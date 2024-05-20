<?php

use App\Http\Controllers\CompanyProfile;
use App\Http\Controllers\EmployeeProfile;
use App\Http\Controllers\NSRP;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\JobPosting\JobPostApplicants;
use App\Livewire\Admin\JobPosting\JobPostOverview;
use App\Livewire\Employer\Dashboard\JobPostList;
use App\Livewire\Employer\Jobpost\JobApplicants;
use App\Livewire\Public\Dashboard;
use App\Livewire\Public\JobpostView;
use App\Livewire\Public\Profile\EmployerProfile;
use App\Livewire\Public\Profile\Jobseeker\JobseekerProfile;
use App\Livewire\Public\Profile\Jobseeker\Partials\EditDetails;
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
// Route::post('/admin/add', [AdminTable::class, 'addData'])->name('addDataAdmin');
// Route::post('/admin/addPeso', [AdminTable::class, 'addPeso'])->name('addPesoAdmin');

//ADMIN LOGIN REDIRECT
// Route::get('/admin', [AdminTable::class, 'index'])->name('admintables');

//JOBSEEKER PROFILE
Route::get('/employee', [EmployeeProfile::class, 'employeeProfile'])->name('employeeProfile');
Route::post('/employee/update', [EmployeeProfile::class, 'updateDescEmp'])->name('updateDescEmp');

//EMPLOYER PROFILE
Route::get('/company', [CompanyProfile::class, 'companyProfile'])->name('companyProfile');
Route::post('/company/update', [CompanyProfile::class, 'updateDescCompany'])->name('updateDescCompany');

//LARAVEL DEFAULT ROUTES
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/home', function () {
    return view('dashboard.home');
})->middleware(['auth', 'verified'])->name('dashboard.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/jobpost/application', function () {
    return view('dashboard.partials.jobseeker-application');
})->name('jobseeker.application');

Route::get('/myapplication', function () {
    return view('dashboard.partials.employer-jobpost');
})->name('jobpost');

// EMPLOYER
Route::get('/test2', function () {
    return view('admin.admin_partials.applicant-list');
})->name('213');

// EMPLOYER
Route::get('/apply', function () {
    return view('dashboard.partials.employer-jobpost');
})->name('jobpost.apply');

Route::get('/jobpost/list', JobPostList::class)->name('employer.dashboard');

Route::get('/applicants', JobApplicants::class)->name('jobpost.applicants');

Route::get('/test3', EditDetails::class)->name('edit.details.test');

// PUBLIC
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/jobpost/{id}', JobpostView::class)->name('jobpost.show');
// PUBLIC - PROFILE
Route::get('/profile/jid={id}', JobseekerProfile::class)->name('jobseeker.profile');
Route::get('/profile/eid={id}', EmployerProfile::class)->name('employer.profile');

// ADMIN TESTING NAV
Route::get('/admin', function () {
    return view('admin.admin_partials.admin-dashboard');
})->name('admin');

Route::get('admin/job/applicants', function () {
    return view('admin.admin_partials.applicant-list');
})->name('admin-applicants');

Route::get('admin/job/overview', function () {
    return view('admin.admin_partials.applicant-overview');
})->name('admin-appoverview');

Route::get('/admin/eligibility', function () {
    return view('admin.admin_partials.eligibility-license');
})->name('admin-eligibility');

Route::get('/admin/jobs', function () {
    return view('admin.admin_partials.job-posting-list');
})->name('admin-joblist');

Route::get('/admin/jobs/overview', function () {
    return view('admin.admin_partials.job-posting-overview');
})->name('admin-jobs');

Route::get('/admin/account/overview', function () {
    return view('admin.admin_partials.jobseeker-overview');
})->name('admin-overview');

Route::get('/admin/location', function () {
    return view('admin.admin_partials.location-management');
})->name('admin-location');

Route::get('/admin/industry', function () {
    return view('admin.admin_partials.position-industry');
})->name('admin-industry');

Route::get('/admin/certificate', function () {
    return view('admin.admin_partials.admin-certificates');
})->name('admin-certificate');

Route::get('/admin/requirements', function () {
    return view('admin.admin_partials.requirements');
})->name('admin-req');

Route::get('/admin/manage-admin', function () {
    return view('admin.admin_partials.admin-accounts');
})->name('admin-admin');

//ADMIN JOBPOST
Route::get('/admin/job/overview/{id}', JobPostOverview::class)->name('admin.jobpost');

Route::get('/admin/job/applicants/{id}', JobPostApplicants::class)->name('admin.jobpost.applicants');

require __DIR__ . '/auth.php';
