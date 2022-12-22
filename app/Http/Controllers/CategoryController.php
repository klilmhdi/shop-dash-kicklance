<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string', 'min:5'],
            // 'image'=>[ 'required', 'image', 'mimes:png,jpg,jpeg', 'max:12288'],
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()){
                $data['image'] =  $request->file('image')->store('categories', 'public');
        }
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Created Done');;
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('dashboard.categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required', 'string', 'min:5'],
            // 'image'=>[ 'required', 'image', 'mimes:png,jpg,jpeg', 'max:12288'],
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()){
                $data['image'] =  $request->file('image')->store('products', 'public');
        }
        $categories = Category::findOrFail($id);
        $categories->update($data);
        return redirect()->route('admin.categories.index')->with('message', 'Updated Done');
    }

    public function destroy(Category $categories, $id)
    {
        $categories = Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
