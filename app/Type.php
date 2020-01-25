<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function incidents()
    {
        return $this->belongsToMany('App\Incident');
    }
}
