<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;

    protected $table = 'eligibility';
    protected $primaryKey = 'eligibility_id';

    protected $fillable = [
        'employee_id',
        'eligibility_Type',
        'eligibility_Date',
    ];

    protected $casts = [
        'eligibility_Date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function eligibilityType()
    {
        return $this->belongsTo(Eligibility_Type::class, 'eligibility_Type');
    }
}
