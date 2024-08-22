<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company';
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'user_id',
        'business_Name',
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
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
    public function job_posting()
    {
        return $this->hasMany(Job_Posting::class, 'company_id');
    }

    public function company_industry_line()
    {
        return $this->hasMany(Company_Industry_Line::class, 'company_id');
    }

}
