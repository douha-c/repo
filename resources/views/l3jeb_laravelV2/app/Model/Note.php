<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Note extends Pivot
{
    protected $table = 'notes';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'module_id',
        'stagiaire_id',
        'note'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
