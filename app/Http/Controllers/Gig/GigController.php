<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GigController extends Controller
{

    public function showAddForm(Request $request)
    {
        return view('gig.showAddForm');
    }
}
