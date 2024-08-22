<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job_Tags extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_tags';
    protected $primaryKey = 'job_tags_id';

    protected $fillable = [
        'job_id',
        'position_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function job_posting()
    {
        return $this->belongsTo(Job_Posting::class, 'job_id');
    }

    public function job_positions()
    {
        return $this->belongsTo(Job_Positions::class, 'position_id');
    }
}
