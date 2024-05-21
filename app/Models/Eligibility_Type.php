<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility_Type extends Model
{
    use HasFactory;

    protected $table = 'eligibility_type';
    protected $primaryKey = 'eligibility_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eligibility_Name',
        'eligibility_Code',
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

    public function job_posting()
    {
        return $this->hasMany(Eligibility::class, 'eligibility_id');
    }

}
