<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License_Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'license_type';
    protected $primaryKey = 'license_type_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_Name',
        'license_Code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    public function license_type()
    {
        return $this->hasMany(License_Type::class, 'license_type_id');
    }
}
