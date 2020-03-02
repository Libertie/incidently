<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $dates = [
        'occurred_at',
    ];

    //protected $guarded = [];
    protected $fillable = [
        'submitted_by', 'witnessed_by', 'location', 'description', 'leo', 'occurred_at'
    ];

    protected $casts = [
        'leo' => 'boolean'
    ];

    public function path()
    {
        return '/incidents/' . $this->id;   
    }

    public function people()
    {
        return $this->belongsToMany('App\Person')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type')->withTimestamps();
    }

    public function addPhoto($file, $caption)
    {
        $file = $file->store('uploads');
        return $this->photos()->create(compact(['file', 'caption']));
    }
}
