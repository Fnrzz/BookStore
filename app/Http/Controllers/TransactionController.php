<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        $data = Transaction::latest();

        return $data->filter()->paginate(10);
    }

    public function getPayments(Product $product)
    {
        $tripay = new TripayController;
        

        $data = [
            'product' => $product,
            'channels' => $tripay->getPayments()
        ];

        return view('Home.transaction.transaction',$data);
    }

    public function store(Request $request)
    {
        // Create Tripay
        $product = Product::find($request->product_id);
        $method = $request->method;

        $tripay = new TripayController;
        $transaction = $tripay->store($method,$product);

        // Create Database
        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'total_amount' => $transaction->amount,
            'address' => auth()->user()->address,
            'phone' => auth()->user()->phone,
            'status' => $transaction->status,
            'date' => $request->date,
        ]);

        return redirect()->route('transaction.show',[
            'reference' => $transaction->reference,
        ]);
    }

    public function detail($reference)
    {
        $tripay =  new TripayController;

        $data = [
            'detail' => $tripay->detail($reference),
        ];
        return view('Home.transaction.detailTransaction',$data);
    }
}
