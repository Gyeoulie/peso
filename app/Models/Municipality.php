<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipality';
    protected $primaryKey = 'municipality_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'municipality_Name',
        'municipality_Code',
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

    /**
     * Get the province that owns the municipality.
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function peso()
    {
        return $this->hasMany(PESO::class, 'municipality_id');
    }
    public function job_posting()
    {
        return $this->hasMany(Job_Posting::class, 'municipality_id');
    }
}
