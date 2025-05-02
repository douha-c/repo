<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Group(){
        return $this->belongsTo(Group::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'notes')
                    // ->using(Note::class)
                    ->withPivot('id','note');
    }

}
