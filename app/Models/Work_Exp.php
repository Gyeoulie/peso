<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Work_Exp extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

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
        'deleted_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function job_positions()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }

    public static function fieldMappings()
    {
        return [
            'workexp_id' => 'Work Experience ID',
            'employee_id' => 'Employee ID',
            'work_Name' => 'Company Name',
            'work_Address' => 'Company Address',
            'position_id' => 'Position ID',
            'work_Start' => 'Start Date',
            'work_End' => 'End Date',
            'work_Status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
