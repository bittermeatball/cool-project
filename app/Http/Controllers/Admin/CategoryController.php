<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequests\CategoryRequest;

use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->toArray();

        return View::make('admin.categories-manager.all-categories')
        ->with('categories',$categories);
    }

    public function filterCategories($property,$filter)
    {
        // Show all categories but filtered
        $categories = Category::all();

        return View::make('admin.categories-manager.all-categories-filtered')
        ->with('categories',$categories)
        ->with('property',$property)
        ->with('filter',$filter);
    }

    public function create()
    {
        $categories = Category::all()->toArray();
        return View::make('admin.categories-manager.add-category')
        ->with('categories',$categories);
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();

        $category = new Category([
            'category_name' => $request->get('category_name'),
            'slug'=> slug($request->get('category_name')),
            'parent_id'=> $request->get('parent_id'),
            'keywords'=> $request->get('keywords'),
            'description'=> $request->get('description'),
          ]);

          $category->save();

          return redirect('/admin/category');
    }

    public function show(Category $category)
    {
        $category = Category::find($category);

        return View::make('admin.categories-manager.show-category')
        ->with('category',$category);        
    }

    public function edit(Category $category)
    {
        $category = Category::find($category);

        return View::make('admin.categories-manager.edit-category')
        ->with('category',$category);     
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $request->validated();

        $category =  Category::find($category);
        $category->category_name = $request->get('category_name');
        $category->slug = $request->get('slug');
        $category->parent_id = $request->get('parent_id');
        $category->status = $request->get('status');
        $category->keywords = $request->get('keywords');
        $category->description = $request->get('description');

        $category->save();

        return View::make('admin.categories-manager.edit-category')
        ->with('category',$category)
        ->with('successMsg','You have successfully updated  infomation of the category.');
    }

    public function destroy(Category $category)
    {
        $category = Category::find($id);
        $category->delete();
   
        return redirect('/admin/category');
    }
    
    public function activate($id)
    {

        $category =  Category::find($id);
        $category->status = 'active';

        $category->save();
   
        return redirect('/admin/category');
    }

    public function deactivate($id)
    {

        $category =  Category::find($id);
        $category->status = 'deactivated';

        $category->save();
   
        return redirect('/admin/category');
    }

}