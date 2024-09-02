<?php

namespace App\Models;

//

use App\Redactors\FiveHashRedactor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Redactors\LeftRedactor;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $attributeModifiers = [
        'password' => FiveHashRedactor::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'deleted_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'user_id');
    }
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }
    public function peso_accounts()
    {
        return $this->hasOne(PESO_Accounts::class, 'user_id');
    }

    public static function fieldMappings()
    {
        return [
            'id' => 'User ID',
            'email' => 'Email Address',
            'password' => 'Password',
            'usertype' => 'User Type',
            'email_verified_at' => 'Email Verified At',
            'remember_token' => 'Remember Token',
            'deleted_at' => 'Deleted At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
