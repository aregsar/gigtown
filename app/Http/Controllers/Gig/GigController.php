<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GigController extends Controller
{  
    //Route::get('/gig/add', 'gig\GigController@addForm')->name('gig.addForm');
    public function addForm(Request $request)
    {     
        return view('gig.addForm');
    }


    //https://laravel.com/api/5.4/Illuminate/Support/ViewErrorBag.html
    //https://laravel.com/api/5.4/Illuminate/Contracts/Support/MessageBag.html
    // public function addForm(Request $request)
    // {
    //     $viewErrorBag = $request->session()->get('errors');
    
    //     if($viewErrorBag)
    //     {
    //         dd($viewErrorBag);
       
    //         $errors = $viewErrorBag->getBag("default");
    //         if($errors)dd($errors);
    //         if($errors)dd($errors->all());
    //         if($errors)dd($errors->get('desc'));
    //         if($errors)dd($errors->get('gigday'));         
    //     }
    
    //     return view('gig.addForm');
    // }

   
    // public function addForm(Request $request)
    // {
    //     $viewErrorBag = $request->session()->get('errors');

    //     $gig_add_url = route('gig.add');

    //     if($viewErrorBag)
    //     {
    //         $errors = $viewErrorBag->getBag("default");

    //         $data = ["gigdayErrors" => $errors->get('gigday')
    //                  ,"descErrors" => $errors->get('desc') 
    //                  ,"oldDesc" => $request->old("desc")
    //                  ,"oldGigDay" => $request->old("gigday")
    //                  ,"gig_add_url" => $gig_add_url];

    //         //dd($data);
    //     }
    //     else
    //     {
    //         $data = ["gigdayErrors" => []
    //         ,"descErrors" => []
    //         ,"oldDesc" => null
    //         ,"oldGigDay" => null
    //         ,"gig_add_url" => $gig_add_url];

    //         //dd($data);
    //     }        

    //     return view('gig.addForm', $data);
    // }




    //Route::post('/gig/add', 'gig\GigController@add')->name('gig.add');
    public function add(Request $request)
    {
        //dd(session());
        //dd($request->session());

        $this->validate($request, [
            'desc' => 'required|max:10',
            'gigday'=>'required|date_format:"Y-m-d"',
        ]);

        $request->session()->flash('status', 'Added');
        return redirect(route("gig.addForm"));
        //return redirect(route("gig.addForm"))->with('status', 'Added');
    }


//    public function add(Request $request)
//    {
//        //dd($request->session());

//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:10',
//            'gigday'=>'required|date_format:"Y-m-d"',
//        ]);

//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

//        return redirect(route("gig.addForm"))->with('status', 'Added');
//    }


//    public function add(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:10',
//            'gigday'=>'required|date_format:"Y-m-d"',
//        ]);

//        if ($validator->fails()) {
//            return redirect(route("gig.addForm"))
//                ->withErrors($validator)
//                ->withInput();
//        }

//        return redirect(route("gig.addForm"))->with('status', 'Added');
//    }

  


}
