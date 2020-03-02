<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'incident_id', 'file', 'caption'
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }

    public function path()
    {
        return "/incidents/{$this->incident->id}/photos/{$this->id}";
    }
}
