<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Reg extends Model
{
    use HasFactory;

    protected $table = 'program_reg';
    protected $primaryKey = 'program_reg_id';

    protected $fillable = [
        'employee_id',
        'program_id',
        'program_reg_Status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function programs()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
