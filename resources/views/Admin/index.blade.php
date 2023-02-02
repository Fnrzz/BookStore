@extends('Admin.layouts.layout')

@section('content')
    <section style="padding-top: 3rem">
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Hallo <b class="c1">{{ auth()->user()->name }}</b></h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm" style="width: 100%;" data-aos="fade-up">
                        <div class="card-body text-center">
                          <h1 class="card-title"><i class="bi bi-people-fill"></i></h1>
                          <h6 class="card-subtitle mb-2 text-muted">User</h6>   
                          <p class="card-text">{{ $user->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm" style="width: 100%;" data-aos="fade-up">
                        <div class="card-body text-center">
                          <h1 class="card-title"><i class="bi bi-wallet-fill"></i></h1>
                          <h6 class="card-subtitle mb-2 text-muted">Transactions</h6>
                          <p class="card-text">{{ $transactions->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm" style="width: 100%;" data-aos="fade-up">
                        <div class="card-body text-center">
                          <h1 class="card-title"><i class="bi bi-archive-fill"></i></h1>
                          <h6 class="card-subtitle mb-2 text-muted">Products</h6>
                          <p class="card-text">{{ $products->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection