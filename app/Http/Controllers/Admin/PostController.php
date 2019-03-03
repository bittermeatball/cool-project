<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequests\CategoryFromPostRequest;

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
        $categories = Category::all()->toArray();
        
        return View::make('admin.posts-manager.add-post')
        ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryFromPostRequest $c_request)
    {
        $category_id = $request->get('category_id');

        if ($c_request->get('category_name') != NULL || $c_request->get('category_name') != '') {
            $c_request->validated();
            $category = new Category([
                'category_name' => $c_request->get('category_name'),
                'slug'=> slug($c_request->get('category_name')),
                'parent_id'=> $c_request->get('parent_id'),
            ]);
            $category->save();    
            $category_id = $category->id;        
        }

        $post = new Post([
            'post_title' => $request->get('post_title'),
            'post_description'=> $request->get('post_description'),
            'post_thumbnail'=> $request->get('post_thumbnail'),
            'post_content'=> $request->get('post_content'),
            'category_id'=> $category_id,
            'post_author'=> Auth::user()->name,
            ]);
            $post->save();
            return redirect('/admin/post');   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post)->first();

        return View::make('admin.posts-manager.post-preview')
        ->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($post)->first();

        // show the view and pass the user to it
        return View::make('admin.posts-manager.edit-post')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post);

        $post->title = $request->get('post_title');
        $post->description = $request->get('post_description');
        $post->thumbnail = $request->get('post_thumbnail');
        $post->content = $request->get('post_content');
        $post->category_id = $request->get('category_id');
        $post->author =  Auth::user()->name;

        $post->save();
        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function destroy(Post $post)
    {
        $post = Post::find($post);
        $post->delete();
   
        return redirect('/admin/posts');
    }

    public function saveDraft($id)
    {

        $post =  Post::find($id);
        $post->status = 'draft';

        $post->save();
   
        return redirect('/admin/post');
    }
     
    public function publish($id)
    {

        $post =  Post::find($id);
        $post->status = 'publish';

        $post->save();
   
        return redirect('/admin/post');
    }

}
