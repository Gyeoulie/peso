<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirements_Passed extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'requirements_passed';
    protected $primaryKey = 'req_passed_id';

    protected $fillable = [
        'company_id',
        'requirement_id',
        'req_passed_Input',
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

    public function requirement()
    {
        return $this->belongsTo(Requirements::class, 'requirement_id');
    }
    
}
