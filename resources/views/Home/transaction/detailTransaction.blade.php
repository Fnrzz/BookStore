@extends('Home.layouts.layout')

@section('content')
    <section id="detail-transaction" style="padding-top: 3rem">
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
                            <div class="row">
                                <h3>Rp. {{ number_format($detail->amount) }}</h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if ($detail->status === "PAID")
                                        <span class="badge text-bg-success">{{ $detail->status }}</span>
                                    @else
                                        <span class="badge text-bg-danger">{{ $detail->status }}</span>
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