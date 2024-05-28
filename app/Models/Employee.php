<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'height',
        'gender',
        'civilstatus',
        'religion',
        'birthdate',
        'pnumber',
        'address',
        'barangay_id',
        'tinnum',
        'empstatus',
        'empstatusdesc',
        'pimg',
        'resume',
        'empDesc',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'employee_id');
    }
    public function disability()
    {
        return $this->hasMany(Disability::class, 'employee_id');
    }
    public function language()
    {
        return $this->hasMany(Language::class, 'employee_id');
    }
    public function education()
    {
        return $this->hasMany(Education::class, 'employee_id');
    }
    public function eligibility()
    {
        return $this->hasMany(Eligibility::class, 'employee_id');
    }
    public function job_applicants()
    {
        return $this->hasMany(Job_Applicants::class, 'employee_id');
    }
    public function job_preference()
    {
        return $this->hasMany(Job_Preference::class, 'employee_id');
    }
    public function license()
    {
        return $this->hasMany(License::class, 'employee_id');
    }
    public function program_reg()
    {
        return $this->hasMany(Job_Posting::class, 'employee_id');
    }
    public function skills()
    {
        return $this->hasMany(Skills::class, 'employee_id');
    }
    public function training()
    {
        return $this->hasMany(Training::class, 'employee_id');
    }
    public function work_exp()
    {
        return $this->hasMany(Work_Exp::class, 'employee_id');
    }
}
