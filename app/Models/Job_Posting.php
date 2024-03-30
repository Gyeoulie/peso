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
        'position_id',
        'job_Description',
        'job_Wage',
        'job_Slots',
        'job_Address',
        'barangay_id',
        'job_Duration',
        'job_Status',
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

    public function industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }

    public function position()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
