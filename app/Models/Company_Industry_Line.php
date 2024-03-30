<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Industry_Line extends Model
{
    use HasFactory;

    protected $table = 'company_industry_line';
    protected $primaryKey = 'company_industry_line_id';

    protected $fillable = [
        'company_id',
        'industry_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }
}
