<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $transactions = Transaction::where('user_id',auth()->user()->id)->latest()->paginate(10);

        $data = [
            'transactions' => $transactions
        ];

        return view('Dashboard.index',$data);
    }

    public function transactionDetail($reference,$id)
    {
    
        $tripay = new TripayController;

        $transactions = Transaction::where('id',$id)->first();

        
        $data = [
            'detail' => $tripay->detail($reference),
            'transaction' => $transactions,
        ];

        return view('Dashboard.transaction.detailTransaction',$data);

    }

    public function changeProfile($username)
    {
        $user = User::where('username',$username)->first();
        return view('Dashboard.profile.changeProfile',compact('user'));
    }

    public function updateProfile(User $user,Request $request)
    {
        $validData = $request->validate([
            'email' => 'required|email:dns',
            'name'  => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $user->update($validData);

        return redirect('/dashboard')->with('success','Change Profile Successfull!');
    }
}
