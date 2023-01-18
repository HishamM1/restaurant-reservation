<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    public function index()
    {
        return view('menu', [
            'menu' => Menu::all()
        ]);
    }
    public function addMenu()
    {
        return view('addMenu', ['categories' => Category::all('id', 'name')]);
    }
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:8000'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $attributes['image'] = request()->file('image')->store('menuImages', 'public');
        Menu::create($attributes);
        return redirect()->route('menu');
    }
    public function destroy($id)
    {
        $menu = Menu::find($id);
        Storage::delete('public/' . $menu->image);
        $menu->delete();
        return redirect()->route('menu');
    }
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('editMenu', [
            'food' => $menu,
            'categories' => Category::all('id', 'name')
        ]);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['mimes:jpg,png,jpeg', 'max:8000'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);
        if (isset($attributes['image'])) {
            $attributes['image'] = request()->file('image')->store('menuImages', 'public');
        }
        Menu::find($id)->update($attributes);
        return redirect()->route('menu');
    }
}
