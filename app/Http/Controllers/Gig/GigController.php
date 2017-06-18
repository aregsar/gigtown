<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GigController extends Controller
{  
    public function showAddForm(Request $request)
    {
        $viewErrorBag = $request->session()->get('errors');
        if($viewErrorBag)
        {
            //dd($viewErrorBag);
        
            $errors = $viewErrorBag->getBag("default");
            //if($errors)dd($errors);
            //if($errors)dd($errors->get('desc'));
            //if($errors)dd($errors->get('gigday'));
            //if($errors)dd($errors->all());
            $data = ["gigdayErrors" => $errors->get('gigday')];
        }
        else
        {
            $data = ["gigdayErrors" => []];
        }       

        return view('gig.showAddForm',$data);
    }

    public function add(Request $request)
    {
        //dd($request->session());

        $this->validate($request, [
            'desc' => 'required|max:10',
            'gigday'=>'required|date_format:"Y-m-d"',
        ]);

        return redirect(route("gig.showAddForm"));
    }

//    public function add(Request $request)
//    {
//        //dd($request->session());
//
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:10',
//            'gigday'=>'required|date_format:"Y-m-d"',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        return redirect(route("gig.showAddForm"));
//    }

//    public function add(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:10',
//            'gigday'=>'required|date_format:"Y-m-d"',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect(route("gig.add"))
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        return redirect(route("gig.showAddForm"));
//    }

    //https://laravel.com/api/5.4/Illuminate/Support/ViewErrorBag.html
    //https://laravel.com/api/5.4/Illuminate/Contracts/Support/MessageBag.html
    // public function showAddForm(Request $request)
    // {
    //     $viewErrorBag = $request->session()->get('errors');
    //     if($viewErrorBag)
    //     {
    //         //dd($viewErrorBag);
    //    
    //         $errors = $viewErrorBag->getBag("default");
    //         //if($errors)dd($errors);
    //         //if($errors)dd($errors->get('desc'));
    //         //if($errors)dd($errors->get('gigday'));
    //         //if($errors)dd($errors->all());
    //     }
    //
    //     return view('gig.showAddForm');
    // }


}
