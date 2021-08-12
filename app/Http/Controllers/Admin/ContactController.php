<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Lang;
use App;

// use App\Helpers\Contracts\SaveStr;
use SaveStr;

class ContactController extends Controller
{
    public function show ( Request $request ) {
        // $request->session()->get('key', 'default');
        // $request->session()->put('key.first', 'default');
        // $request->session()->put('key.first1', 'default1');
        // $request->session()->put('key.first2', 'default2');
        // if($request->session()->has('key.first')) {
        //     dump ( $request->all() )
        // }
        // $request->session()->push('key.second', 'value2');
        // session(['key.test'=> 'third']);
        // delete from session
        // Session::forget('test');
        // Session::forget('key.test');
        // Session::push('key.second', 'value3');
        // Session::flush(); - delete all from session
        // Session::pull('key.first2')  -show and delete from session
        // Session::flash('message', 'val'); - save message to one request
        // Session::reflash(); - resave flash for one plus request
        // $title_head = Lang::get('messages.welcome', ['name'=>'Ben']);
        
        if(Lang::has('messages.apples')) {
            $title_head = Lang::choice('messages.apples', 100);
        }
        // dump(Lang::$app);
        return view('post.contacts', ['title'=>'Contacts']);
    }

    public function storage ( Request $request/*, SaveStr $saveStr*/) {

        // $var = App::make('SaveStr');

        if($request->isMethod('post')) {
            // dd($request->except('_token'));
            $this->validate( $request,[
                'name'=>'required'
            ] );

            dump($request->all());
            // $saveStr->save($request, $request->user());
            // $var->save($request, $request->user());
            SaveStr::save($request, $request->user());
        }
        dump($request->session()->all());
    }
}
