<?php

namespace App\Http\Controllers;

use App\Http\Requests\passwordrequest;
use App\Http\Requests\userrequest;
use App\Models\admins;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    //
    public function index()
    {
        $usersdata = User::select('id', 'user_name', 'email', 'mobile', 'age')->paginate(paginationcount);
        return view('users.index', ['usersdata' => $usersdata]);
    }
    public function edit($userid)
    {
        if ($userid == Auth::user()->id || session()->get('admindata')->position == 'master') {
            $user = User::find($userid);
            if (!$user) {
                return redirect('user/index')->with(['message' => __('msg.user doesn\'t exist')]);
            }
            $userdata = User::select('id', 'user_name', 'email', 'mobile', 'age')->find($userid);
            return view('users.edit', ['userdata' => $userdata]);
        } else {
            return redirect()->back();
        }
    }
    public function update(userrequest $request, $userid)
    {
        //update
        $user = User::find($userid);
        if (!$user) {
            return redirect('user/index')->with(['message' => __('msg.user doesn\'t exist')]);
        }
        $data = [
            'user_name' => $request->user_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'age' => $request->age,
        ];
        $op = User::where('id', $userid)->update($data);
        $admin = admins::where('user_id',$userid)->get();
        if($admin){
            $new = ['email'=>$data['email']];
            admins::where('id',$admin['0']->id)->update($new);
        }
        if ($op) {
            $message = __('msg.user data updated successfully');
        } else {
            $message = __("msg.no change in data happened");
        }

        session()->flash('message', $message);
        return redirect('user/index');
    }
    public function destroy($userid)
    {
        //
        if ($userid == Auth::user()->id || session()->get('admindata')->position == 'master') {
            $op = User::find($userid)->delete();

            if ($op) {
                $message = __("msg.user deleted");
            } else {
                $message = __("msg.error try again");
            }

            session()->flash('message1', $message);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function passreset($userid)
    {
        if ($userid == Auth::user()->id) {
            $user = User::find($userid);
            if (!$user) {
                return redirect('user/display')->with(['message' => __('msg.user doesn\'t exist')]);
            }
            $userdata = User::select('password')->find($userid);
            return view('auth.passwords.passreset', ['userdata' => $userdata]);
        } else {
            return redirect()->back();
        }
    }

    public function doreset(passwordrequest $request, $userid)
    {
        //update
        $user = User::find($userid);
        if (!$user) {
            return redirect('user/display');
        }
        if( Hash::check($request->oldpassword, $user->password) === true){
            if($request->password === $request->password_confirmation){
                $data = [
                    'password' => Hash::make($request->password),
                ];
            }else{
                session()->flash('message', __('msg.password confirmation must be identical to password'));
                return redirect()->back();
            }
        }else{
            session()->flash('message', __('msg.old password is wrong'));
            return redirect()->back();
        }
        $op = User::where('id', $userid)->update($data);
        if ($op) {
            $message = __('msg.password updated successfully');
        }

        session()->flash('message', $message);
        return redirect('user/display');
    }

    public function userdisplay()
    {
        if (null !== Auth::user()) {
            return view('users.userdisplay');
        } else {
            return redirect('home');
        }
    }
}
