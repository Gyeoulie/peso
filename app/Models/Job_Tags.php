<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Tags extends Model
{
    use HasFactory;

    protected $table = 'job_tags';
    protected $primaryKey = 'job_tags_id';

    protected $fillable = [
        'job_id',
        'position_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function job()
    {
        return $this->belongsTo(Employee::class, 'job_id');
    }

    public function position()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }
}
