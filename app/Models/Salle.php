<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $guarded = [];


    public function eleve(){
        return $this->hasOne(eleve::class);
    }

    public function matiere()
    {
        return $this->hasMany(matiere::class);
    }

}
