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
        'libelle',
        'date',
        'type',
        'montant',
        'secteur_id',
        'financement_id',
        'centre_id',
        'devise',
        'moyen',
        'status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function centre()
    {
        return $this->belongsTo(\App\Models\Centre::class);
    }
    public function secteur()
    {
        return $this->belongsTo(\App\Models\Secteur::class);
    }
    public function finance()
    {
        return $this->belongsTo(\App\Models\Financement::class);
    }
}
