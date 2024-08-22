<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company_Industry_Line extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_industry_line';
    protected $primaryKey = 'company_industry_line_id';

    protected $fillable = [
        'company_id',
        'industry_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function job_industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }
}
