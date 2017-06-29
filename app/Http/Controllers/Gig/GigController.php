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
    //     $status = session('status');

    //     if($viewErrorBag)
    //     {
    //         $errors = $viewErrorBag->getBag("default");

    //         $data = ["gigdayErrors" => $errors->get('gigday')
    //                  ,"descErrors" => $errors->get('desc') 
    //                  ,"oldDesc" => $request->old("desc")
    //                  ,"oldGigDay" => $request->old("gigday")
    //                  ,"gig_add_url" => $gig_add_url
    //                  ,"status"=> $status];
    //         //dd($data);
    //     }
    //     else
    //     {
    //         $data = ["gigdayErrors" => []
    //                 ,"descErrors" => []
    //                 ,"oldDesc" => null
    //                 ,"oldGigDay" => null
    //                 ,"gig_add_url" => $gig_add_url
    //                 ,"status"=> $status];
    //         //dd($data);
    //     }        

    //     return view('gig.addForm', $data);
    // }

   
   
    // public function addForm(Request $request)
    // {
    //     $gig_add_url = route('gig.add');
    //     $status = session('status');

    //     if($this->hasValidationErrors($request))
    //     {
    //         $data = ["gigdayErrors" => $this->getValidationErrorsFor($request,'gigday')
    //                  ,"descErrors" => $this->getValidationErrorsFor($request,'desc') 
    //                  ,"oldDesc" => $request->old("desc")
    //                  ,"oldGigDay" => $request->old("gigday")
    //                  ,"gig_add_url" => $gig_add_url
    //                  ,"status"=> $status];
    //     }
    //     else
    //     {
    //         $data = ["gigdayErrors" => []
    //                 ,"descErrors" => []
    //                 ,"oldDesc" => null
    //                 ,"oldGigDay" => null
    //                 ,"gig_add_url" => $gig_add_url
    //                 ,"status"=> $status];
    //     }        

    //     return view('gig.addForm', $data);
    // }

    // protected function hasValidationErrors(Request $request)
    // {
    //     $viewErrorBag = $request->session()->get('errors');
    //     if($viewErrorBag)
    //     {
    //         return true;
    //     }
    //     return false;
    // }

    // protected function getValidationErrorsFor(Request $request, $fieldName)
    // {
    //     $viewErrorBag = $request->session()->get('errors');
    //     if($viewErrorBag)
    //     {
    //         $errors = $viewErrorBag->getBag("default");

    //         return $errors->get($fieldName);
    //     }
    //     return [];
    // }


    //Route::post('/gig/add', 'gig\GigController@add')->name('gig.add');
    public function add(Request $request)
    {
        //dd(session());
        //dd($request->session());

        $this->validate($request, [
            'desc' => 'required|max:100',
            'gigday'=>'required|date|date_format:"Y-m-d"|after:today',
        ]);

        $request->session()->flash('status', 'Added');
        return redirect(route("gig.addForm"));
        //return redirect(route("gig.addForm"))->with('status', 'Added');
    }


//    public function add(Request $request)
//    {
//        //dd($request->session());
//
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:100',
//            'gigday'=>'required|date|date_format:"Y-m-d"|after:today',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        return redirect(route("gig.addForm"))->with('status', 'Added');
//    }


//    public function add(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'desc' => 'required|max:100',
//            'gigday'=>'required|date|date_format:"Y-m-d"|after:today',
//        ]);

//        if ($validator->fails()) {
//            return redirect(route("gig.addForm"))
//                ->withErrors($validator)
//                ->withInput();
//        }

//        return redirect(route("gig.addForm"))->with('status', 'Added');
//    }

  


}
