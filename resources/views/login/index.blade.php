@extends('layouts.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-md-3">
        <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        
        {{-- @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')['text'] }}
            </div>
        @endif --}}

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="/login" method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <small class="d-block text-center">Not Registered? <a href="/register">Register Now</a></small>
        </form>
    </main>
    </div>
</div>

@endsection