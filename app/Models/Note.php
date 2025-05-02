<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table='notes';
    public $timestamps=false;
    protected $fillable = ['note','stagiaire_id','module_id'];
    public function stagiaire()
    {
        return $this->belongsTo('App\Models\Stagiaire');
    }
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }
}
