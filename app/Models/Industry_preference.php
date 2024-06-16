<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry_preference extends Model
{
    use HasFactory;

    protected $table = 'industry_preference';
    protected $primaryKey = 'industry_pref_id';

    protected $fillable = [
        'employee_id',
        'industry_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function job_industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }
}
