<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function operationUser()
    {
        return $this->hasMany(\App\Models\Operations::class);
    }
    public function secteurUser()
    {
        return $this->hasMany(\App\Models\Secteur::class);
    }

    public function financeUser()
    {
        return $this->hasMany(\App\Models\Financement::class);
    }
    public function centreUser()
    {
        return $this->hasMany(\App\Models\Centre::class);
    }

    public function caisseUser()
    {
        return $this->hasMany(\App\Models\Caisse::class);
    }

    public function compteUser()
    {
        return $this->hasMany(\App\Models\Compte::class);
    }


    public function billetcaisseUser()
    {
        return $this->hasMany(\App\Models\BilletCaisse::class);
    }
    public function detailcaisseUser()
    {
        return $this->hasMany(\App\Models\DetailCaisse::class);
    }
}
