<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Industry extends Model
{
    use HasFactory;

    protected $table = 'job_industry';
    protected $primaryKey = 'industry_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'industry_Title',
        'industry_Code',
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
    public function industry_preference()
    {
        return $this->hasMany(Industry_preference::class, 'industry_id');
    }
    public function job_posting()
    {
        return $this->hasMany(Job_Posting::class, 'industry_id');
    }
}
