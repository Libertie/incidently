<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $dates = [
        'occurred_at',
    ];
    protected $guarded = [];


    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
