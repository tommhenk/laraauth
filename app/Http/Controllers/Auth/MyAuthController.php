<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class MyAuthController extends Controller
{
    public function create() {

        return view ('auth.login');
    }

    public function store (Request $request) {
        $array = $request->all();
        $remember = $request->has('remember');

        if (!Auth::check()) {
            $user = User::findOrFail(2);
            dd($user);
        }
       if (
        Auth::attempt([
                    'login'=>$array['login'], 
                    'password'=>$array['password'],
                    'active'=>1
                ], $remember)
     ) {
        return redirect()->intended('/admin');
       }

       if ( Auth::viaRemember() ) {
            return 'authorisation from cookie';
       }

       return redirect()->back()->withInput($request->only('login', 'remember'))->withErrors([
        'login'=>'Data of authenticate is nor correct'
       ]);
    }

    public function destroy ( Request $request ) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
