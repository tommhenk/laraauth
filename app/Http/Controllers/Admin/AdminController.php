<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function show ( Request $request ) {

        Auth::loginUsingId(1);
        dump($request->user());
/*
        if (!Auth::check()) {
            $user = User::findOrFail(1);
            Auth::login($user);
        }
        Auth::logout();
        dump($request->user());
       
        $user = Auth::user();
        dump($user->id);

        $user2 = $request->user();
        dump($user2->name);

        if( Auth::check() ) {
            dump(Auth::check());
        }else {
            return redirect()->route('login');
        }

        dump( Auth::id() );
        */
        return view ('welcome');
    }
}
