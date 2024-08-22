<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirements extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'requirements';
    protected $primaryKey = 'requirement_id';

    protected $fillable = [
        'requirement_Title',
        'requirement_Status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    public function requirements_passed()
    {
        return $this->hasMany(Requirements_Passed::class, 'requirement_id');
    }
}
