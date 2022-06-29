<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function register_view(){
    //     return view('admin-register');
    // }
    public function login()
    {
        return view('admin.login');
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(["error" => "❌ Invalid Credentials"]);
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function authRegister(Request $request)
    {

        $request->validate([
            'name' => 'required|max:80',
            'email' => 'required|email|unique:admins|max:150',
            'password' => 'required|confirmed|min:8',
        ]);

        $admin = new Admin();
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);


        try {
            $admin->save();
            Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            return redirect()->route('admin.register')->withErrors(["error" => "❌ Something is wrong, User not Registered!"]);
            //return redirect()->route('admin.register')->withErrors(["error" => $e->getMessage()]);
        }
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function form()
    {
        return view('admin.form');
    }

    public function datatable()
    {
        return view('admin.datatable');
    }


    public function profile()
    {
        return view('admin.profile');
    }

    public function forbiddenAccess()
    {
        return view('admin.errors.403-forbidden-access');
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }

}
