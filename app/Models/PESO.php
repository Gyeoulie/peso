<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PESO extends Model
{
    use HasFactory;

    protected $table = 'peso';
    protected $primaryKey = 'peso_id';

    protected $fillable = [
        'user_id',
        'peso_Pnum',
        'peso_Tnum',
        'peso_Fnum',
        'peso_Email',
        'municipality_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
