<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Applicants extends Model
{
    use HasFactory;

    protected $table = 'job_applicants';
    protected $primaryKey = 'applicant_id';

    protected $fillable = [
        'employee_id',
        'job_id',
        'applicant_Status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function job()
    {
        return $this->belongsTo(Job_Posting::class, 'job_id');
    }
}
