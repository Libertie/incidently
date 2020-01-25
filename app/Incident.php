<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
