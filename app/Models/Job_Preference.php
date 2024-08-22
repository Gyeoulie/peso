<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job_Preference extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_preference';
    protected $primaryKey = 'job_preference_id';

    protected $fillable = [
        'employee_id',
        'position_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function job_positions()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }
}
