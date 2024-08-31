<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class PESO extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'peso';
    protected $primaryKey = 'peso_id';

    protected $fillable = [
        'user_id',
        'peso_Fname',
        'peso_Mname',
        'peso_Lname',
        'peso_Pnumber',
        'municipality_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function job_posting()
    {
        return $this->hasMany(Job_Posting::class, 'peso_id');
    }

    public static function fieldMappings()
    {
        return [
            'peso_id' => 'PESO ID',
            'user_id' => 'User ID',
            'peso_Pnumber' => 'PESO Phone Number',
            'municipality_id' => 'Municipality ID',
            'peso_Fname' => 'PESO First Name',
            'peso_Mname' => 'PESO Middle Name',
            'peso_Lname' => 'PESO Last Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
