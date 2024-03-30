<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'user_id',
        'bussines_Name',
        'trade_Name',
        'company_TIN',
        'company_Type',
        'employer_Type',
        'employer_Type_Desc',
        'company_Total_workforce',
        'company_Address',
        'barangay_id',
        'contact_Person',
        'contact_Person_position',
        'company_Pnum',
        'company_Tnum',
        'company_Fnum',
        'company_Email',
        'company_Status',
        'company_img',
        'company_Desc',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
