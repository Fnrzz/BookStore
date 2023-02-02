<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    public function all()
    {
        $data = Product::latest();

        return $data->filter()->paginate(12);
    }

    public function detail($id)
    {
        $data = Product::where('id', $id)->first();

        return $data;
    }

    public function products()
    {
        $data = Product::latest()->paginate(4);
        return $data;
    }

    public function store($request)
    {
        $validateData =  $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:products',
            'price' => 'required',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('book-images');
        }
        Product::create($validateData);


        return redirect('/admin/products')->with('success', 'Create Product Successfuly!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function update($product, $request)
    {
        $rules = [
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|image|file|max:1024',
        ];

        if ($product->slug != $request->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validateData = $request->validate($rules);

        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('book-images');
        }

        Product::where('id', $product->id)->update($validateData);

        return redirect('/admin/products')->with('success', 'Edit Product Successfuly!');
    }
}
