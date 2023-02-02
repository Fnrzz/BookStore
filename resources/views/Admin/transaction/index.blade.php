@extends('Admin.layouts.layout')

@section('content')
    <section style="padding-top: 2rem">
        <div class="container">
            <div class="row mb-2">
                <div class="col-6">
                    <h5 class="text-muted ">Transactions</h5>
                </div>
            </div>
            <hr>
        </div>
        <div class="container pt-3">
            <div class="row mb-3">
                <div class="col">
                    <h6 class="text-muted">Last Transaction</h6>
                </div>
                <div class="col-md-3 col-6 ms-auto">
                    <form action="/admin/transactions">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="search" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text btn btn-success text-white" id="basic-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="card" data-aos="fade-left" >
                    <div class="card-body">
                        @if ($transactions->count())
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Book</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $item)    
                                            <tr>
                                                <td>
                                                    <h6>{{ $item->user->name }}</h6>
                                                    <h6 class="text-muted">{{ $item->user->email }}</h6>
                                                </td>
                                                <td>
                                                    <h6>{{ $item->product->title }}</h6>
                                                    <h6 class="text-muted">{{ $item->product->category->name }}</h6>
                                                </td>
                                                <td>
                                                    <h6>Rp. {{ number_format($item->total_amount) }}</h6>
                                                </td>
                                                <td>
                                                    @if ($item->status === "paid")    
                                                        <span class="badge text-bg-success text-uppercase">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge text-bg-danger text-uppercase">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin/transaction-detail/{{ $item->reference }}/{{ $item->id }}">
                                                        <span class="badge rounded-pill text-bg-primary fs-6"><i class="bi bi-archive"></i></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $transactions->links() }}
                        @else
                            <div class="row">
                                <div class="col text-center">
                                    <h6>Transactions Not Found</h6>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection