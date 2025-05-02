<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps = false;
    // public $incrementing = false; // Tell Laravel it's not auto-incrementing

    public function Representant()
    {
        return $this->hasOne(Representant::class);
    }

    public function stagiaires()
    {
        return $this->belongsToMany(Stagiaire::class, 'notes')
                    // ->using(Note::class)
                    ->withPivot('id','note');
    }
}
