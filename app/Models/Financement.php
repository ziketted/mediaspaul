<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Financement extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'libelle',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function financeOperation()
    {
        return $this->hasMany(\App\Models\Operations::class);
    }
}
