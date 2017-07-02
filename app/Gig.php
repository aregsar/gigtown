<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Gig extends Model
{
    public static $rules = [
            'desc' => 'required|max:100',
            'date'=>'required|date|date_format:"Y-m-d"|after:today',
        ];

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
       $data = ['desc' => $desc
               ,'date' => $date];

       $validator = Validator::make($data, Gig::$rules);

       if ($validator->passes())
       {
            $input = ['user_id'=> Auth::id()
                ,'desc' => $desc
                ,'date' => $date];

            (new Gig($input))->save();
       }
    }

    public static function createFromRequest($request)
    {
       $validator = Validator::make($request->all(), Gig::$rules);

       if ($validator->passes())
       {
            $input = ['user_id'=> $request->user()->id
                ,'desc' => $request->input('desc')
                ,'date' => $request->input('date')];

            (new Gig($input))->save();
       }
    }
}
