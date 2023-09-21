<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $guarded = [];

    public function matiere(){
        return $this->belongsTo(matiere::class);
    }

    public function eleve(){
        return $this->belongsTo(eleve::class);
    }
}
