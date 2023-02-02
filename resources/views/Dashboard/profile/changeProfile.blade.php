@extends('Dashboard.layouts.layout')

@section('content')
    <section id="changeProfile" style="padding-top: 3rem;padding-bottom:3rem">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Change Profile</h5>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8">
                    <form action="/dashboard/change-profile/{{ $user->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                            @error('email')    
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ $user->name }}">
                            @error('name')    
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}">
                            @error('phone')    
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ $user->address }}</textarea>
                            @error('address')    
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Change Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection