<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Caisse extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'caisse',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
