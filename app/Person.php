<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function incidents()
    {
        return $this->belongsToMany('App\Incident');
    }
}
