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
        'applicant_Resume',
        'applicant_Status',
        'peso_Status',
        'company_Remarks',
        'peso_Remarks',
        'peso_Letter',
        'applicant_Notif',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function job_posting()
    {
        return $this->belongsTo(Job_Posting::class, 'job_id');
    }
}
