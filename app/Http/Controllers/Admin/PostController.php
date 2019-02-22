<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // View all posts
        return View::make('admin.posts-manager.all-posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.posts-manager.add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post([
            'post_title' => $request->get('post-title'),
            'post_description'=> $request->get('post-description'),
            'post_thumbnail'=> $request->get('post-thumbnail'),
            'post_content'=> $request->get('post-content'),
            'post_author'=> Auth::user()->name,
          ]);
          $post->save();
          return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::find($id);
        // return View::make('admin.posts-manager.post-details')
        // ->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($id);

        // show the view and pass the user to it
        return View::make('admin.posts-manager.edit-post')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($id);

        $post->title = $request->get('post-title');
        $post->description = $request->get('post-description');
        $post->thumbnail = $request->get('post-thumbnail');
        $post->content = $request->get('post-content');
        $post->title =  Auth::user()->name;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($id);
        $post->delete();
   
        return redirect('/admin/posts');
    }
}
