<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{

    use HasFactory, SoftDeletes;

    protected $primaryKey = 'education_id';

    protected $table = 'education';
    protected $fillable = [
        'employee_id',
        'edu_School',
        'edu_Level',
        'edu_Course',
        'edu_Started',
        'edu_Ended',
        'edu_Ongoing',
    ];

    protected $casts = [
        'edu_Started' => 'date',
        'edu_Ended' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
