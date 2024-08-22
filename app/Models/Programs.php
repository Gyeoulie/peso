<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'programs';
    protected $primaryKey = 'program_id';

    protected $fillable = [
        'program_Title',
        'program_Modality',
        'program_Type',
        'program_Host',
        'program_Slots',
        'industry_id',
        'program_Datetime',
        'program_Deadline',
        'program_Location',
        'program_Description',
        'program_Qualification',
        'program_Remarks',
        'program_Status',
        'program_pubmat',
        'program_Status',
    ];

    protected $casts = [
        'program_Datetime' => 'datetime',
        'program_Deadline' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function job_industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }

    public function program_reg()
    {
        return $this->hasMany(Program_Reg::class, 'program_id');
    }
    public function program_tags()
    {
        return $this->hasMany(Program_Tags::class, 'program_id');
    }


    public function attendedJobseekers()
    {
        return $this->hasMany(Program_Reg::class, 'program_id')
            ->where('program_reg_Status', 'ATTENDED');
    }
}
