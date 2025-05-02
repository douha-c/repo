<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'matricule';

    public function Module()
    {
        return $this->belongsTo(Module::class);
    }

}
