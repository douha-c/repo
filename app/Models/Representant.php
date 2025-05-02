<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    protected $primaryKey = 'marticule';
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }
}
