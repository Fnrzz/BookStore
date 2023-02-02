@extends('Home.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/product/{{ $product->slug }}" class="shadow-sm">
                    <span class="badge text-bg-info text-white"><i class="bi bi-arrow-left-circle"></i> Back</span>
                </a>
            </div>
        </div>
    </div>
    <section id="transaction" style="padding-top: 3rem">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <h5 class="text-muted">Choose Payments :</h5>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                <div class="col">
                    <div data-aos="fade-right">
                        <div class="card m-auto shadow-sm" style="width: 50%" >
                            <div class="card-body text-center">
                                @if ($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" width="60%" alt="{{ $product->image }}">
                                @else
                                    <img src="{{ asset('assets/book1.jpg') }}" class="img-fluid" width="60%" alt="book1.jpg">
                                @endif
                                <h5 class="card-title fw-bold">{{ $product->title }}</h5>
                                <h6 class="card-subtitle mb-2 c1">{{ $product->category->name }}</h6>
                                <h5 class="card-subtitle mb-3 text-success fw-bold">Rp. {{ number_format($product->price) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-3 ">
                        @foreach ($channels as $channel)
                            @if ($channel->active)    
                                <div class="col">
                                    <div data-aos="fade-left">
                                        <form action="{{ route('transaction.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                            <input type="hidden" value="{{ $channel->code }}" name="method">
                                            <input type="hidden" value="{{ date('Y-m-d') }}" name="date">
                                            <button type="submit" class="card">
                                                <div class="card-body " style="height: 6rem" >
                                                    <h6>
                                                        Pay With {{ $channel->name }}
                                                    </h6>          
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
