<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_Exp extends Model
{
    use HasFactory;
    protected $table = 'work_experience';
    protected $primaryKey = 'workexp_id';

    protected $fillable = [
        'employee_id',
        'work_Name',
        'work_Address',
        'position_id',
        'work_Start',
        'work_End',
        'work_Status',
    ];

    protected $casts = [
        'work_Start' => 'date',
        'work_End' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function job_positions()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }
}
