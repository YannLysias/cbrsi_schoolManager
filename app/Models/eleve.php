<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }


    public function Salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function notes(){
        return $this->hasMany(note::class);
    }



}
