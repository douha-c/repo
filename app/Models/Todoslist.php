<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todoslist extends Model
{
    public $timestamps = false;

    public $fillable = ['id', 'title', 'status'];
}
