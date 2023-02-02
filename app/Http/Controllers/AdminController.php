<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::where('id', '!=', 1),
            'transactions' => Transaction::all(),
            'products' => Product::all(),
        ];
        return view('Admin.index', $data);
    }

    public function transactions()
    {
        $transactions = new TransactionController;

        $data = [
            'transactions' => $transactions->getTransactions()
        ];

        return view('Admin.transaction.index', $data);
    }

    public function transactionDetail($reference, $id)
    {

        $tripay = new TripayController;

        $transactions = Transaction::where('id', $id)->first();


        $data = [
            'detail' => $tripay->detail($reference),
            'transaction' => $transactions,
        ];

        return view('Admin.transaction.detailTransaction', $data);
    }

    public function products()
    {
        $product =  new ProductController;
        $products = $product->all();
        return view('Admin.products.index', compact('products'));
    }

    public function productDetail(Product $product)
    {
        $products = $product;
        return view('Admin.products.product', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('Admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $product = new ProductController;
        return $product->store($request);
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect('/admin/products')->with('success', 'Delete Product Successfuly');
    }

    public function editProduct(Product $product)
    {
        $products = $product;
        $categories = Category::all();
        return view('Admin.products.edit', compact('products', 'categories'));
    }

    public function updateProduct(Product $product, Request $request)
    {
        $products = new ProductController;
        return $products->update($product, $request);
    }
}
