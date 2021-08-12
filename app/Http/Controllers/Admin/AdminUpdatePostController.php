<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Gate;

class AdminUpdatePostController extends Controller
{
    public function show ( $id ) {
        $post = Post::findOrFail($id);
        // dd($post->name);
        return view('post.update_post', [
            'title'=>'Update post',
            'post'=>$post
        ]);
    }

    public function create ( Request $request ) {


        $this->validate($request, ['name'=>'required']);

        $user = Auth::user();
        $data = $request->except('_token');

        $post = Post::findOrFail($data['id']);
        // $this->authorize('update', $post);
        $this->authorizeForUser($user, 'update', $post);
        // if (Gate::/*forUser(3)->*/allows('update-article', $post)) {
        //     $post->name = $data['name'];
        //     $post->img = $data['img'];
        //     $post->text = $data['text'];

        //     $user->posts()->save($post);

        //     return redirect()->back()->with('message', 'Post updated successfuly');
        // }

        // if (Gate::/*forUser(3)->*/allows('update', $post)) {
        //     $post->name = $data['name'];
        //     $post->img = $data['img'];
        //     $post->text = $data['text'];

        //     $user->posts()->save($post);

        //     return redirect()->back()->with('message', 'Post updated successfuly');
        // }

        if ($request->user()->can('update', $post)) {
            $post->name = $data['name'];
            $post->img = $data['img'];
            $post->text = $data['text'];

            $user->posts()->save($post);

            return redirect()->back()->with('message', 'Post updated successfuly');
        }

        return redirect()->back()->with('message', 'You have not allows');
    }
}
