<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PostRequests\TagRequest;
use App\Http\Requests\PostRequests\TagUpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function create()
    {
        //
    }

    public function show(Tag $tag)
    {
        //       
    }

    public function edit(Tag $tag)
    {
        //  
    }

    public function index()
    {
        $tags = Tag::all();

        return View::make('admin.tags-manager.all-tags')
        ->with('tags',$tags);
    }

    public function filterTags($property,$filter)
    {
        // Show all tags but filtered
        $tags = Tag::all();

        return View::make('admin.tags-manager.all-tags-filtered')
        ->with('tags',$tags)
        ->with('property',$property)
        ->with('filter',$filter);
    }

    public function store(TagRequest $request)
    {
        $request->validated();

        $tag = new Tag([
            'tag_name' => $request->get('tag_name'),
            'keywords' => $request->get('keywords'),
            'description'=> $request->get('description'),
        ]);

        $tag->save();

        return redirect('/admin/tag');
    }

    public function storeFromPost(TagRequest $request)
    {
        $request->validated();

        $tag = new Tag([
            'tag_name' => $request->get('tag_name'),
        ]);

        $tag->save();

        return back();
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $request->validated();
 
        $tag =  Tag::find($tag)->first(); 

        $tag->tag_name = $request->get('tag_name');
        $tag->keywords = $request->get('keywords');
        $tag->description = $request->get('description');
        $tag->status = $request->get('status');

        $tag->save();

        session()->flash('message', 'You have successfully updated infomation of the tag.');
        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag = Tag::find($tag)->first();
        $tag->delete();
   
        return redirect('/admin/tag');
    }
    
    public function activate($tag)
    {

        $tag =  Tag::find($tag);
        $tag->status = 'active';

        $tag->save();
   
        return redirect('/admin/tag');
    }

    public function deactivate($tag)
    {

        $tag =  Tag::find($tag);
        $tag->status = 'deactivated';

        $tag->save();

        return redirect('/admin/tag');
    
    }

}
