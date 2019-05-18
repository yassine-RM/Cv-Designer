<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }}
