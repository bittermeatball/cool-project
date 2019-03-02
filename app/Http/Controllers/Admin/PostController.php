<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

use App\Post;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequests\CategoryRequest;

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
    public function store(Request $request, CategoryRequest $request_2)
    {
        if($request->get('category_name') == NULL){
            $post = new Post([
                'post_title' => $request->get('post_title'),
                'post_description'=> $request->get('post_description'),
                'post_thumbnail'=> $request->get('post_thumbnail'),
                'post_content'=> $request->get('post_content'),
                'post_author'=> Auth::user()->name,
                ]);
                
                $post->save();
                return redirect('/admin/post');   
        } 
        else {
            $request_2->validated();

            $category = new Category([
                'category_name' => $request_2->get('category_name'),
                'slug'=> slug($request_2->get('category_name')),
                'parent_id'=> $request_2->get('parent_id'),
            ]);

            $category->save();
            return redirect()->back()->withOldInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post);

        $post->title = $request->get('post_title');
        $post->description = $request->get('post_description');
        $post->thumbnail = $request->get('post_thumbnail');
        $post->content = $request->get('post_content');
        $post->author =  Auth::user()->name;

        $post->save();
        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
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
