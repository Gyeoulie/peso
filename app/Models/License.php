<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
   use HasFactory;

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
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function License_Type()
    {
        return $this->belongsTo(License_Type::class, 'license_type_id');
    }
}
