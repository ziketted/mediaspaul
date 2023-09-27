<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operations extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'date',
        'type',
        'montant',
        'beneficiaire',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
