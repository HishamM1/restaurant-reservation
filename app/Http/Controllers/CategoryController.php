<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'categories' => Category::all()
        ]);
    }
    public function addCategory()
    {
        return view('addCategory');
    }
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:8000']
        ]);

        $attributes['image'] = request()->file('image')->store('categoriesImages', 'public');
        Category::create($attributes);
        return redirect()->route('categories');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        Storage::delete('public/' . $category->image);
        $category->delete();
        return redirect()->route('categories');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('editCategory', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:8000']
        ]);
        $attributes['image'] = request()->file('image')->store('categoriesImages', 'public');
        Category::find($id)->update($attributes);
        return redirect()->route('categories');
    }
}
