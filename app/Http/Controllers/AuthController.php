<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\session;
use App\Models\User;
use App\Models\ListItem;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        $check->save();

        return redirect("login")->with('save', 'Success')->withErrors('error', 'Failed');;
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('mainpage')
                ->with('save', 'Success')->withErrors('error', 'Failed');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function mainpage()
    {
        if (Auth::check()) {
            return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->where('email', Auth::user()->email)->get()]);
        }
        return redirect("login")->withSuccess('You do not have access');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
