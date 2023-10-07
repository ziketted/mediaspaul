<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compte extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'libelle',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
