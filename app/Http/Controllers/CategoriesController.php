<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('categories', ['category' => $category]);
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($request->all());

        return redirect('categories')->with('status', 'Category add success');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());

        return redirect('categories')->with('status', 'Category update success');

    }

    public function delete($slug)
    {
        $categoryDelete = Category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $categoryDelete]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'category deleted success');
    }

    public function deleted()
    {
        $categoryDeleted = Category::onlyTrashed()->get();
        return view('category-deleted', ['categoryDeleted' => $categoryDeleted]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'category restore success');
    }
}
