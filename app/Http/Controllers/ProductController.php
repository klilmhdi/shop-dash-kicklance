<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('dashboard.products.index', ['products'=>$products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', ['categories'=>$categories]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string'],
            'description'=>['required', 'string'],
            'price'=>['required', 'numeric', 'min:1'],
            'image'=>[ 'required', 'image', 'mimes:png,jpg,jpeg', 'max:12288'],
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()){
                $data['image'] =  $request->file('image')->store('products', 'public');
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('message', 'Created Done');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.products.edit', [
            'product'=>$products,
            'categories'=>$categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required', 'string'],
            'description'=>['required', 'string'],
            'price'=>['required', 'numeric', 'min:1'],
            'image'=>['required', 'mimes:png,jpg,jpeg', 'max:12288'],
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $data['image'] =  $request->file('image')->store('products', 'public');
        }
        $products = Product::findOrFail($id);
        $products->update($data);
        return redirect()->route('admin.products.index')->with('message', 'Edited Done');
    }

    public function destroy($id)
    {
        $products = Product::destroy($id);
        return redirect()->route('admin.products.index')->with('message', 'Deleted Done');
    }
}
