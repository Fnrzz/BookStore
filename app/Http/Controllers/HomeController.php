<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $feature = new FeatureController;
        $products = new ProductController;
        $data = [
            'features' => $feature->index(),
            'products' => $products->products(),
        ];
        return view('Home.index',$data);
    }

    public function product(Product $product)
    {
        $id = $product->id;
        $products =  new ProductController;

        $data = [
            'product' => $products->detail($id)
        ];

        return view('Home.product',$data);
        
    }

    public function products()
    {
        $products = new ProductController;
        $data = [
            'products' => $products->all()
        ];

        return view('Home.products',$data);

    }
}
