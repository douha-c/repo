<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table='module';
    public $timestamps=false;
    public function representant()
    {
        return $this->hasOne('App\Models\Representant');
    }
    public function stagiaires()
    {
        return $this->belongsToMany('App\Models\Stagiaire','notes')->withPivot('note');
    }
}
