<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BilletCaisse extends Model
{


    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'beneficiaire',
        'type',
        'devise',
        'moyen',
        'piece',
        'num_piece',
        'date',
        'total',
        'secteur_id',
        'financement_id',
        'centre_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
