<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentcontroller extends Controller
{
    //
    public function store(request $request,$ad_id)
    {
        //insert
            comments::create([
                'ad_id'=>$ad_id,
                'owner_id'=>$request->owner_id,
                'user_id'=> Auth::user()->id,
                'comment' => $request->comment,
            ]);

            return redirect()->back();
    }
}
