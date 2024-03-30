<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'height',
        'gender',
        'civilstatus',
        'religion',
        'birthdate',
        'pnumber',
        'address',
        'barangay',
        'tinnum',
        'empstatus',
        'empstatusdesc',
        'pimg',
        'empDesc',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay');
    }

}
