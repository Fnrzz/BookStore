@extends('Dashboard.layouts.layout')

@section('content')
    <section id="dashboard" style="padding-top: 2rem">
        <div class="container">
            <div class="row mb-2">
                <div class="col-6">
                    <h5 class="text-muted ">DASHBOARD</h5>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <a href="/dashboard/change-profile/{{ auth()->user()->username }}" class="btn btn-info btn-sm text-white rounded">Change Profile</a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container pt-3">
            <div class="row mb-3">
                <div class="col">
                    <h6 class="text-muted">Last Transaction</h6>
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
                                                    <a href="/dashboard/transaction-detail/{{ $item->reference }}/{{ $item->id }}">
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
        @if (session()->has('success'))    
        <div class="toast-container position-fixed bottom-0 end-0 p-3" >
          <div  class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-header">
              <strong class="me-auto">Message</strong>
              <small>Now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              {{ session('success') }}
            </div>
          </div>
        </div>
        @endif
    </section>
@endsection