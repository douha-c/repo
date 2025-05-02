<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Stagiaire extends Model
{
    use HasFactory, Notifiable;
    public function groupe(){
        return $this->belongsTo('App\Models\Groupe','groupe_idM');
    }
    public function modules(){
        return $this->belongsToMany('App\Models\Module','notes')->withPivot('note');
    }
}
