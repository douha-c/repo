<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $table='groupes';
     protected $primaryKey='idM';
     protected $visible=['idM','nom','updated_at'];
    public function stagiaires(){
        return $this->hasMany('App\Models\Stagiaire','groupe_idM');
    }
}
