<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminrequest;
use App\Models\admins;
use App\Models\User;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    //
    public function index()
    {
        $adminsdata = admins::select('id', 'email', 'position', 'user_id')->paginate(paginationcount);
        foreach($adminsdata as $admin){
            $admin_name = $admin->user()->value('user_name');
            $admin['user_name'] = $admin_name;
            $adminsdata[$admin->user_id-1]=$admin;
        }
        return view('admins.index', ['adminsdata' => $adminsdata]);
    }

    public function create($adminid)
    {
        $admindata = User::select('email','id')->find($adminid);
        return view('auth.adminregister', ['admindata' => $admindata]);
    }

    public function store(adminrequest $request)
    {
        //insert
        if ($request->password == $request->passwordconfirm) {
            admins::create([
                'user_id'=> $request->user_id,
                'email' => $request->email,
                'password' => sha1($request->password),
                'position' => $request->position,
            ]);
            return redirect(route('adminlogin'))->with(['success' => __('msg.registed successfully')]);
        } else {
            return redirect()->back()->withInput()->with(['ident' => __('msg.confirm password must be identical to password')]);
        }
    }

    public function adminlogin()
    {
        return view('auth.adminlogin');
    }

    public function dologin(Request $request)
    {
        // Logic

        $data = $this->validate($request, [

            "email"     => "required|email",
            "password"  => "required|min:8"
        ]);

        $pass = sha1($request->password);
        $a = admins::where('email', $request->email)->where('password', $pass)->select('id', 'email', 'position')->get();
        if (!$a->isEmpty()) {
            foreach ($a as $admindata) {
                $request->session()->put('admindata', $admindata);
                return redirect('admin/index');
            }
        } else {
            return redirect()->route('adminlogin')->withInput($request->only('email'));
        }
    }

    public function masteredit($adminid)
    {
        $admin = admins::find($adminid);
        if (!$admin) {
            return redirect('admin/index')->with(['message' => __('msg.admin doesn\'t exist')]);
        }
        $admindata = admins::select('id', 'email', 'password', 'position')->find($adminid);
        return view('admins.masteredit', ['admindata' => $admindata]);
    }

    public function masterupdate(adminrequest $request, $adminid)
    {
        //update
        $admin = admins::find($adminid);
        if (!$admin) {
            return redirect('admin/index')->with(['message' => __('msg.admin doesn\'t exist')]);
        }
        if ($request->password == $request->passwordconfirm) {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'position' => $request->position,
        ];}else{
            return redirect()->back()->withInput()->with(['ident' => __('msg.confirm password must be identical to password')]);
        }
        if ($admin->password != $request->password) {
            $data['password'] = sha1($request->password);
        }
        if ($admin->email === $request->email) {
        $op = admins::where('id', $adminid)->update($data);
        if ($op) {
            $message = __('msg.admin data updated successfully');
        } else {
            $message = __("msg.no change in data happened");
        }
        session()->flash('message', $message);
        return redirect('admin/index');
        }else{
            return redirect()->back()->with(['ident' => __('msg.E-mail must stay unchanged')]);
        }
    }

    public function destroy($adminid)
    {
        //
        if (session()->get('admindata')->id == $adminid || session()->get('admindata')->position == 'master') {
            if(admins::find($adminid)){
            $op = admins::find($adminid)->delete();
            }else{
                session()->flash('message1', __("msg.admin doesn't exist"));
                return redirect()->back();
            }
            if ($op) {
                $message = __("msg.admin deleted");
            } else {
                $message = __("msg.error try again");
            }

            session()->flash('message1', $message);
            return redirect()->back();
        } else {
            session()->flash('message1', __("msg.you are not allowed to delete other admins"));
            return redirect()->back();
        }
    }
}
