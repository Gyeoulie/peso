<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program_Tags extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_tags';
    protected $primaryKey = 'program_tags_id';

    protected $fillable = [
        'program_id',
        'position_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function programs()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }

    public function job_positions()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }
}
