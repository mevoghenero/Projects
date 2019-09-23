<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class WelcomeController extends Controller
{
    public function index()
    {
       $posts = Post::all();

    //    working with array
       return view('welcome', 
       [
           'posts' => $posts
       ]);

    //    working with compact. 
    //    return view('welcome', compact('posts'));
    }
    public function post(Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->text;
        $post->save();
        return back()->with('status','Post created successfully.');

    }
    public function update($id){
        $posts = Post::where('id', $id)->first();
        return view('Edit', compact('posts'));
    }
    public function put(Request $request, $id){
        $update = Post::where('id', $id)->first();
        //dd($update);
        $update->name = $request->name;
        $update->description = $request->text;
        $update->save();
        return redirect(route('post.index'))->with('status', 'Post updated successfully.');
    }
    public function delete($id){
       $delete = Post::where('id', $id)->delete();
       return redirect()->back()->with('status', 'Post deleted successful.');
    }  
}
