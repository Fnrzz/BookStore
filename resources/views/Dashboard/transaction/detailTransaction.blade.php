@extends('Dashboard.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/dashboard" class="shadow-sm">
                    <span class="badge text-bg-info text-white"><i class="bi bi-arrow-left-circle"></i> Back</span>
                </a>
            </div>
        </div>
    </div>
    <section id="detail-transaction" style="padding-top: 3rem;padding-bottom: 3rem;">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-3">
                <div class="col">
                    <div class="card" data-aos="fade-right">
                        <div class="card-body">
                            <div class="row row-cols-2">
                                <div class="col">
                                    <h6 class="text-muted">TRANSACTION DETAIL</h6>
                                </div>
                                <div class="col">
                                    <h6 class="text-end">#{{ $detail->reference }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-5">
                                <h3>Rp. {{ number_format($detail->amount) }}</h3>
                            </div>
                            <div class="row">
                                <h6 class="text-muted">Customer Name :</h6>
                                <b class="mb-2">{{ $transaction->user->name }}</b>
                                <h6 class="text-muted">Customer Address :</h6>
                                <b class="mb-2">{{ $transaction->address }}</b>
                                <h6 class="text-muted">Customer Phone :</h6>
                                <b class="mb-2">{{ $transaction->phone }}</b>
                                <h6 class="text-muted">Book Title :</h6>
                                <b class="mb-2">{{ $transaction->product->title }}</b>
                                <h6 class="text-muted">Book Category :</h6>
                                <b class="mb-2">{{ $transaction->product->category->name }}</b>
                                <h6 class="text-muted">Date :</h6>
                                <b class="mb-2">{{ $transaction->created_at->format('Y-m-d') }}</b>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if ($transaction->status === "paid")    
                                        <span class="badge text-bg-success text-uppercase">{{ $transaction->status }}</span>
                                    @else
                                        <span class="badge text-bg-danger text-uppercase">{{ $transaction->status }}</span>
                                    @endif            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" data-aos="fade-left" >
                        <div class="card-body">
                            <h6 class="text-muted">INSTRUCTION</h6>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach ($detail->instructions as $instruction)   
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading{{ str_replace(' ', '', $instruction->title) }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ str_replace(' ', '', $instruction->title) }}" aria-expanded="false" aria-controls="flush-collapse{{ str_replace(' ', '', $instruction->title) }}">
                                            {{ $instruction->title }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ str_replace(' ', '', $instruction->title) }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ str_replace(' ', '', $instruction->title) }}" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ol class="list-group list-group-flush list-group-numbered">
                                                    @foreach ($instruction->steps as $steps)
                                                        <li class="list-group-item">{!! $steps !!}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection