<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'license';
    protected $primaryKey = 'license_id';

    protected $fillable = [
        'employee_id',
        'license_type_id',
        'license_Validity',
    ];

    protected $casts = [
        'license_Validity' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function license_type()
    {
        return $this->belongsTo(License_Type::class, 'license_type_id');
    }
}
