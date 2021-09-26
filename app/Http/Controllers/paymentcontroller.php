<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paymentcontroller extends Controller
{
    //
    public function paymentform(){
        return view('pay');
    }
}
