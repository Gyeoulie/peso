<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $table = 'programs';
    protected $primaryKey = 'program_id';

    protected $fillable = [
        'program_Title',
        'program_Description',
        'program_Host',
        'industry_id',
        'program_Datetime',
        'program_Address',
        'barangay_id',
        'program_Status',
    ];

    protected $casts = [
        'program_Datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function industry()
    {
        return $this->belongsTo(Job_Industry::class, 'industry_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
