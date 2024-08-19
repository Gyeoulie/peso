<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Posting extends Model
{
    use HasFactory;

    protected $table = 'job_posting';
    protected $primaryKey = 'job_id';

    protected $fillable = [
        'company_id',
        'industry_id',
        'job_Title',
        'job_Description',
        'job_Qualifications',
        'job_Remarks',
        'job_MinWage',
        'job_MaxWage',
        'job_Type',
        'job_Edu',
        'job_Slots',
        'job_Address',
        'barangay_id',
        'job_Duration',
        'job_Status',
        'peso_id',
        'peso_municipality_id',
        'peso_Remarks',
    ];

    protected $casts = [
        'job_Duration' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function job_industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function peso()
    {
        return $this->belongsTo(PESO::class, 'peso_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'peso_municipality_id');
    }

    public function job_tags()
    {
        return $this->hasMany(Job_Tags::class, 'job_id');
    }

    public function job_applicants()
    {
        return $this->hasMany(Job_Applicants::class, 'job_id');
    }
    public function requirements_passed()
    {
        return $this->hasMany(Requirements_Passed::class, 'job_id');
    }

    public function hiredApplicants()
    {
        return $this->hasMany(Job_Applicants::class, 'job_id')
            ->where('applicant_status', 'HIRED');
    }

}
