<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GigController extends Controller
{

    public function showAddForm(Request $request)
    {
        $errors = $request->session()->get('errors');
        if($errors)
        {
            dd($errors);
        }
        return view('gig.showAddForm');
    }

    public function add(Request $request)
    {


        //dd($errors);

        $this->validate($request, [
            'desc' => 'required|max:10',
            'gigday'=>'required|date_format:"Y-m-d"',
        ]);



        return redirect("/");
    }

//    public function add(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:10',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect(route("gig.add"))
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        return redirect(route("gig.add"));
//    }
}
