<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    protected $fillable = [
        'desc', 'date'
    ];

    public function artist()
    {
        return $this->belongsTo('App\User');
    }
}
