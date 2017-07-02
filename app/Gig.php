<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Gig extends Model
{
    protected $fillable = [
        'desc', 'date','user_id'
    ];

    public function artist()
    {
        return $this->belongsTo('App\User');
    }

    
    public static function create( $desc
                                 , $date)
    {
        $input = ['user_id'=> Auth::id()
            ,'desc' => $desc
            ,'date' => $date];

        (new Gig($input))->save();
    }

    public static function createFromRequest($request)
    {
        $input = ['user_id'=> $request->user()->id
            ,'desc' => $request->input('desc')
            ,'date' => $request->input('date')];

        (new Gig($input))->save();
    }
}
