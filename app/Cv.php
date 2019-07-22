<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function liens()
    {

        return $this->hasMany('App\Lien');
    }
    public function comments()
    {

        return $this->hasMany('App\Comment');
    }


    public function formations()
    {

        return $this->hasMany('App\Formation');
    }

    public function experiences()
    {

        return $this->hasMany('App\Experience');
    }

    public function loisires()
    {

        return $this->hasMany('App\Loisire');
    }

    public function langues()
    {

        return $this->hasMany('App\Langue');
    }
}