<?php

namespace App\Modules\Admins\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Admins\EloquentBuilders\AdminBuilder;
use App\Modules\Admins\Traits\AdminTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        AdminTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone_number',
        'role_id'

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
        'created_at' => 'date:Y-m-d',
    ];



    public function newEloquentBuilder($query): AdminBuilder
    {
        return new AdminBuilder($query);
    }
}