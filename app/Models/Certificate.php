<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificate';
    protected $primaryKey = 'cert_id';

    protected $fillable = [
        'employee_id',
        'cert_Type_id',
        'cert_From',
        'cert_Date_Issued',
        'cert_Rating',
    ];

    protected $casts = [
        'cert_Date_Issued' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function certificateType()
    {
        return $this->belongsTo(Certificate_Type::class, 'cert_Type_id');
    }
}