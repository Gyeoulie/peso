<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Accounts\JobseekerOverview;
use App\Livewire\Admin\Accounts\UserManagement;
use App\Livewire\Admin\JobPosting\Applicants\ApplicantOverview;
use App\Livewire\Admin\JobPosting\Applicants\JobPostApplicants;
use App\Livewire\Admin\JobPosting\JobPostOverview;
use App\Livewire\Employer\Dashboard\JobApplicants;
use App\Livewire\Employer\Dashboard\JobPostList;
use App\Livewire\Jobseeker\ApplicationHistory;
use App\Livewire\Public\Dashboard;
use App\Livewire\Public\JobpostView;
use App\Livewire\Public\Profile\Employer\EmployerProfile;
use App\Livewire\Public\Profile\Jobseeker\JobseekerProfile;
use App\Livewire\Public\Profile\Jobseeker\Partials\EditDetails;
use App\Livewire\Signup\Employer\EmployerInformation;
use App\Livewire\Signup\Jobseeker\JobseekerInformation;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//------------------------------ SIGN UP ------------------------------
Route::get('/jobseeker/details', JobseekerInformation::class)->name('fill_profile');
Route::get('/employer/details', EmployerInformation::class)->name('fill_employer');

//------------------------------ PUBLIC ------------------------------
Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/jobpost/{id}', JobpostView::class)->name('jobpost.show');
//------------------------------ PUBLIC - PROFILE ------------------------------
Route::get('/profile/jid={id}', JobseekerProfile::class)->name('jobseeker.profile');

Route::get('/profile/eid={id}', EmployerProfile::class)->name('employer.profile');

//------------------------------ JOBSEEKER ------------------------------
Route::get('/applications/history', ApplicationHistory::class)->name('jobseeker.application');
Route::get('/profile/edit', EditDetails::class)->name('edit.details');

//------------------------------ EMPLOYER ------------------------------
Route::get('/apply', function () {
    return view('dashboard.partials.employer-jobpost');
})->name('jobpost.apply');
Route::get('/employer/jobpost', JobPostList::class)->name('employer.dashboard');
Route::get('/applicants', JobApplicants::class)->name('jobpost.applicants');

//------------------------------ ADMIN  NAVIGATION ------------------------------
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.admin_partials.admin-dashboard');
    })->name('admin');

    Route::get('/job/applicants', function () {
        return view('admin.admin_partials.applicant-list');
    })->name('admin-applicants');

    Route::get('/job/overview', function () {
        return view('admin.admin_partials.applicant-overview');
    })->name('admin-appoverview');

    Route::get('/eligibility', function () {
        return view('admin.admin_partials.eligibility-license');
    })->name('admin-eligibility');

    Route::get('/jobs', function () {
        return view('admin.admin_partials.job-posting-list');
    })->name('admin-joblist');

    Route::get('/jobs/overview', function () {
        return view('admin.admin_partials.job-posting-overview');
    })->name('admin-jobs');

    Route::get('/account/overview', function () {
        return view('admin.admin_partials.jobseeker-overview');
    })->name('admin-overview');

    Route::get('/location', function () {
        return view('admin.admin_partials.location-management');
    })->name('admin-location');

    Route::get('/industry', function () {
        return view('admin.admin_partials.position-industry');
    })->name('admin-industry');

    Route::get('/certificate', function () {
        return view('admin.admin_partials.admin-certificates');
    })->name('admin-certificate');

    Route::get('/requirements', function () {
        return view('admin.admin_partials.requirements');
    })->name('admin-req');

    Route::get('/manage-users', UserManagement::class)->name('admin-users');
    Route::get('/manage-users/jobseeker/{id}', JobseekerOverview::class)->name('admin-users-jobseeker');

    Route::get('/manage-admin', function () {
        return view('admin.admin_partials.admin-accounts');
    })->name('admin-admin');
});

// Route::get('/admin', function () {
//     return view('admin.admin_partials.admin-dashboard');
// })->name('admin');

// Route::get('admin/job/applicants', function () {
//     return view('admin.admin_partials.applicant-list');
// })->name('admin-applicants');

// Route::get('admin/job/overview', function () {
//     return view('admin.admin_partials.applicant-overview');
// })->name('admin-appoverview');

// Route::get('/admin/eligibility', function () {
//     return view('admin.admin_partials.eligibility-license');
// })->name('admin-eligibility');

// Route::get('/admin/jobs', function () {
//     return view('admin.admin_partials.job-posting-list');
// })->name('admin-joblist');

// Route::get('/admin/jobs/overview', function () {
//     return view('admin.admin_partials.job-posting-overview');
// })->name('admin-jobs');

// Route::get('/admin/account/overview', function () {
//     return view('admin.admin_partials.jobseeker-overview');
// })->name('admin-overview');

// Route::get('/admin/location', function () {
//     return view('admin.admin_partials.location-management');
// })->name('admin-location');

// Route::get('/admin/industry', function () {
//     return view('admin.admin_partials.position-industry');
// })->name('admin-industry');

// Route::get('/admin/certificate', function () {
//     return view('admin.admin_partials.admin-certificates');
// })->name('admin-certificate');

// Route::get('/admin/requirements', function () {
//     return view('admin.admin_partials.requirements');
// })->name('admin-req');

// Route::get('/admin/manage-admin', function () {
//     return view('admin.admin_partials.admin-accounts');
// })->name('admin-admin');

//ADMIN JOBPOST
Route::get('/admin/job/overview/{id}', JobPostOverview::class)->name('admin.jobpost');
Route::get('/admin/job/applicants/{id}', JobPostApplicants::class)->name('admin.jobpost.applicants');
Route::get('/admin/job/applicants/overview/{id}', ApplicantOverview::class)->name('admin.jobpost.applicants.overview');

// ------------------------------TEST ROUTES------------------------------
Route::get('/teste', EmployerInformation::class)->name('employer.test');

Route::get('/resume', function () {
    return view('resume');
})->name('resume');

require __DIR__ . '/auth.php';

// ------------------------------OLD ROUTES------------------------------
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//JOBSEEKER PROFILE
// Route::get('/employee', [EmployeeProfile::class, 'employeeProfile'])->name('employeeProfile');
// Route::post('/employee/update', [EmployeeProfile::class, 'updateDescEmp'])->name('updateDescEmp');

//EMPLOYER PROFILE
// Route::get('/company', [CompanyProfile::class, 'companyProfile'])->name('companyProfile');
// Route::post('/company/update', [CompanyProfile::class, 'updateDescCompany'])->name('updateDescCompany');

//LARAVEL DEFAULT ROUTES

//JOBSEEKER FILL INFORMATION

// Route::get('/fill', [NSRP::class, 'loadData'])->name('fill_profile');
// Route::post('/fill', [NSRP::class, 'storeInfo'])->name('postInfo');

// //EMPLOYER FILL INFORMATION
// Route::get('/fill/employer', [NSRP::class, 'loadEmployer'])->name('fill_employer');
// Route::post('/fill/employer', [NSRP::class, 'postEmployer'])->name('postEmployer');
