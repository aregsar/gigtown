<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;

//namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;


class GigController extends Controller
{

    public function showAddForm(Request $r)
    {
        return view('gig.showAddForm');
    }
}
