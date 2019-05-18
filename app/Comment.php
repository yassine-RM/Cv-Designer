<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
