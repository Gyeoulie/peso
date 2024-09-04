<?php

use App\Http\Controllers\PDF\PDFView;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Accounts\Employer\EmployerManagement;
use App\Livewire\Admin\Accounts\Employer\EmployerOverview;
use App\Livewire\Admin\Accounts\Jobseeker\JobseekerManagement;
use App\Livewire\Admin\Accounts\Jobseeker\JobseekerOverview;
use App\Livewire\Admin\Accounts\Peso\PesoManagement;
use App\Livewire\Admin\Accounts\Peso\PesoOverview;
use App\Livewire\Admin\Announcement\AnnouncementList;
use App\Livewire\Admin\Announcement\CreateAnnouncement;
use App\Livewire\Admin\Announcement\EditAnnouncement;
use App\Livewire\Admin\Certificates\Certificates;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\EligibilityLicense\EligibilityLicense;
use App\Livewire\Admin\JobPosting\Applicants\ApplicantOverview;
use App\Livewire\Admin\JobPosting\Applicants\JobPostApplicants;
use App\Livewire\Admin\JobPosting\JobPosting;
use App\Livewire\Admin\JobPosting\JobPostOverview;
use App\Livewire\Admin\LocationManagement\Location;
use App\Livewire\Admin\Maintenance\Audits;
use App\Livewire\Admin\Maintenance\Backup;
use App\Livewire\Admin\Maintenance\PesoBranch;
use App\Livewire\Admin\Partnership\PartnershipDetails;
use App\Livewire\Admin\Partnership\PartnershipList;
use App\Livewire\Admin\PositionIndustry\PositionIndustry;
use App\Livewire\Admin\Reports\BarangayReports;
use App\Livewire\Admin\Reports\MunicipalityReports;
use App\Livewire\Admin\Requirements\Requirements;
use App\Livewire\Admin\Training\CreateTrainining;
use App\Livewire\Admin\Training\EditTraining;
use App\Livewire\Admin\Training\TrainingDetails;
use App\Livewire\Admin\Training\TrainingList;
use App\Livewire\Admin\Training\TrainingRegistrants;
use App\Livewire\Employer\Dashboard\JobApplicants;
use App\Livewire\Employer\Dashboard\JobPostList;
use App\Livewire\Employer\Jobpost\JobpostApplication;
use App\Livewire\Employer\Jobpost\JobPostDetails;
use App\Livewire\Jobseeker\ApplicationHistory;
use App\Livewire\Public\AnnouncementView;
use App\Livewire\Public\Dashboard;
use App\Livewire\Public\JobpostView;
use App\Livewire\Public\Profile\Employer\EmployerProfile;
use App\Livewire\Public\Profile\Employer\Partials\EditDetails as EmployerEditDetails;
use App\Livewire\Public\Profile\Jobseeker\JobseekerProfile;
use App\Livewire\Public\Profile\Jobseeker\Partials\EditDetails;
use App\Livewire\Public\Profile\Peso\PesoProfile;
use App\Livewire\Public\SearchProfiles;
use App\Livewire\Public\Trainings;
use App\Livewire\Public\TrainingView;
use App\Livewire\Signup\Employer\EmployerInformation;
use App\Livewire\Signup\Jobseeker\JobseekerInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware(['auth', 'verified', 'usertype:4,6,7,8,9,10,11'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//------------------------------ SIGN UP ------------------------------
// Route::middleware('auth')->group(function () {
Route::get('/jobseeker/details', JobseekerInformation::class)->name('fill_profile');
Route::get('/employer/details', EmployerInformation::class)->name('fill_employer');
// });

//------------------------------ PUBLIC ------------------------------

Route::get('/dashboard', Dashboard::class)->middleware(['verifiedOrPublic', 'check.user.status'])->name('dashboard');
Route::get('/trainings', Trainings::class)->middleware(['verifiedOrPublic', 'check.user.status'])->name('trainings');

Route::get('/jobpost/{id}', JobpostView::class)->name('jobpost.show');
Route::get('/announcements/{id}', AnnouncementView::class)->name('announcement.show');
Route::get('/training/{id}', TrainingView::class)->name('training.show');

//------------------------------ PUBLIC - PROFILE ------------------------------
Route::middleware(['auth', 'verified', 'usertype:4,6,7,8,9,10,11'])->group(function () {
    Route::get('/profile/jid={id}', JobseekerProfile::class)->name('jobseeker.profile');
    Route::get('/profile/eid={id}', EmployerProfile::class)->name('employer.profile');
    Route::get('/profile/pid={id}', PesoProfile::class)->name('peso.profile');
    Route::get('/search/profile', SearchProfiles::class)->name('search.profiles');

});

//------------------------------ JOBSEEKER ------------------------------
Route::middleware(['auth', 'verified', 'usertype:4'])->group(function () {

    Route::get('/applications/history', ApplicationHistory::class)->name('jobseeker.application');
    Route::get('/profile/edit', EditDetails::class)->name('edit.details');
});

//------------------------------ EMPLOYER ------------------------------
// Route::get('/apply', function () {
//     return view('dashboard.partials.employer-jobpost');
// })->name('jobpost.apply');
Route::middleware(['auth', 'verified', 'usertype:6'])->group(function () {
    Route::get('/apply', JobpostApplication::class)->name('jobpost.apply');
    Route::get('/jobpost/details/{id}', JobPostDetails::class)->name('jobpost.details');

    Route::get('/employer/jobpost', JobPostList::class)->name('employer.dashboard');
    Route::get('/applicants', JobApplicants::class)->name('jobpost.applicants');
    Route::get('/employer/edit', EmployerEditDetails::class)->name('edit.details.emp');
});

//------------------------------ ADMIN  NAVIGATION ------------------------------
Route::middleware(['auth', 'verified', 'usertype:8,9,10,11'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', AdminDashboard::class)->name('admin');

        // Route::get('/job/applicants', function () {
        //     return view('admin.admin_partials.applicant-list');
        // })->name('admin-applicants');

        // Route::get('/job/overview', function () {
        //     return view('admin.admin_partials.applicant-overview');
        // })->name('admin-appoverview');

        // // Route::get('/eligibility', function () {
        // //     return view('admin.admin_partials.eligibility-license');
        // // })->name('admin-eligibility');
        Route::get('/eligibility', EligibilityLicense::class)->name('admin-eligibility');

        Route::get('/jobs', JobPosting::class)->name('admin-joblist');

        Route::get('/partnership', PartnershipList::class)->name('admin-partnership');
        Route::get('/partnership/{id}', PartnershipDetails::class)->name('admin-partnership-details');

        // Route::get('/jobs/overview', function () {
        //     return view('admin.admin_partials.job-posting-overview');
        // })->name('admin-jobs');

        Route::get('/account/overview', function () {
            return view('admin.admin_partials.jobseeker-overview');
        })->name('admin-overview');

        Route::get('/location', Location::class)->name('admin-location');

        Route::get('/industry', PositionIndustry::class)->name('admin-industry');

        Route::get('/certificate', Certificates::class)->name('admin-certificate');

        Route::get('/requirements', Requirements::class)->name('admin-req');

        Route::get('/announcements', AnnouncementList::class)->name('admin-announcement');
        Route::get('/announcements/create', CreateAnnouncement::class)->name('admin-create-announcement');
        Route::get('/announcements/edit', EditAnnouncement::class)->name('admin-edit-announcement');

        Route::get('/manage/jobseeker', JobseekerManagement::class)->name('admin-users-jobseeker');
        Route::get('/manage/jobseeker/{id}', JobseekerOverview::class)->name('admin-users-jobseeker-overview');

        Route::get('/manage/employer', EmployerManagement::class)->name('admin-users-employer');
        Route::get('/manage/employer/{id}', EmployerOverview::class)->name('admin-users-employer-overview');

        Route::get('/manage/peso/', PesoManagement::class)->name('admin-users-peso');
        Route::get('/manage/peso/{id}', PesoOverview::class)->name('admin-users-peso-overview');

        // Route::get('/manage-admin', function () {
        //     return view('admin.admin_partials.admin-accounts');
        // })->name('admin-admin');

        Route::get('/training', TrainingList::class)->name('admin-training');
        Route::get('/training/create', CreateTrainining::class)->name('admin-create-training');
        Route::get('/training/edit', EditTraining::class)->name('admin-edit-training');
        Route::get('/training/details/{id}', TrainingDetails::class)->name('admin-view-training');
        Route::get('/training/{id}', TrainingRegistrants::class)->name('admin-registrants-training');

        Route::get('/reports/barangay', BarangayReports::class)->name('admin-reports-barangay');
        Route::get('/reports/municipality', MunicipalityReports::class)->name('admin-reports-municipality');

        Route::get('/peso', PesoBranch::class)->name('admin-peso');
        Route::get('/audits', Audits::class)->name('admin-audits');
        Route::get('/backups', Backup::class)->name('admin-backups');

        Route::get('/job/overview/{id}', JobPostOverview::class)->name('admin.jobpost');
        Route::get('/job/applicants/{id}', JobPostApplicants::class)->name('admin.jobpost.applicants');
        Route::get('/job/applicants/overview/{id}', ApplicantOverview::class)->name('admin.jobpost.applicants.overview');

    });
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

// ------------------------------TEST ROUTES------------------------------
// Route::get('/teste', EmployerInformation::class)->name('employer.test');

// Route::get('/resume', function () {
//     return view('resume');
// })->name('resume');

// Route::get('/resume/view/{id}', ResumeView::class)->name('view.resume');

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

Route::middleware(['auth', 'verified', 'usertype:4,6,7,8,9,10,11'])->group(function () {
    Route::post('/resume/view', [PDFView::class, 'viewResume'])->name('view.resume');
    Route::post('/recommendation/view', [PDFView::class, 'viewRecommendation'])->name('view.recommendation');
    Route::post('/requirement/view', [PDFView::class, 'viewRequirement'])->name('view.requirement');
});

Route::get('/test-google-drive', function () {
    try {
        $disk = Storage::disk('google');
        $files = $disk->files();
        return response()->json($files);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('upload', function (Request $request) {
    $files = Storage::disk("google")->allFiles();
    dd($files);
});
