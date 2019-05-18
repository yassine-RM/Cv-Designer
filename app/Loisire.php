<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loisire extends Model
{
    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }
}
