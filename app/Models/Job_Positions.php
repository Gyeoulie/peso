<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Positions extends Model
{
    use HasFactory;

    protected $table = 'job_positions';
    protected $primaryKey = 'position_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_Title',
        'position_Code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function job_preference()
    {
        return $this->hasMany(Job_Preference::class, 'position_id');
    }
    public function job_tags()
    {
        return $this->hasMany(Job_Tags::class, 'position_id');
    }
}
