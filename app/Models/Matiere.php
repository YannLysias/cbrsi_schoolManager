<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $guarded = [];

    public function notes(){
        return $this->hasMany(note::class);
    }


    public function interrogations(){
        return $this->hasMany(note::class)->where('type', 'Interrogation');
    }


    public function devoirs(){
        return $this->hasMany(note::class)->where('type', 'Devoir');
    }



    public function Salle()
    {
        return $this->belongsTo(Salle::class);
    }
}
