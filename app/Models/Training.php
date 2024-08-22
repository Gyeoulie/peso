<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'training';
    protected $primaryKey = 'training_id';

    protected $fillable = [
        'employee_id',
        'training_Name',
        'training_From',
        'training_Cert',
        'training_Start',
        'training_End',
        'training_Status',
    ];

    protected $casts = [
        'training_Start' => 'date',
        'training_End' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
