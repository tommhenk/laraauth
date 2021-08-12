<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use Event;
use App\Events\onAddPostEvent;

class AdminPostController extends Controller
{
    public function show () {
        return view('post.add_post', ['title'=>'add post']);
    }

    public function create ( Request $request ) {

        // if(Gate::denies('add_artice')) {
        //     return redirect()->back()->with('message', 'User have not allows');
        // }

        
        $post = new Post;
        // if(Gate::denies('add', $post)) {
        //      return redirect()->back()->with('message', 'User have not allows');
        // }

        if ($request->user()->cannot('add', $post)) {
            return redirect()->back()->with('message', 'User have not allows');
        }
        $this->validate($request, [
            'name'=>'required'
        ]);
        // dd($request->except('_token'));
        $user = Auth::user();
        $res = $user->posts()->create($request->except('_token'));

        // Event::dispatch(new onAddPostEvent($res, $user));
        // event(new onAddPostEvent($res, $user));
        Event::dispatch('onAddPostEvent', [$res, $user]);
        return redirect()->back()->with('message', 'Post add successfuly');
    }
}
