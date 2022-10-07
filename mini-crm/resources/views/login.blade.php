@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        @if(session()->has('success'))
        <div class = "alert alert-success alert-dismissible fade show" role="alert">
            {{ session ('success')}}
            <button type="button" class = "btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class = "alert alert-danger alert-dismissible fade show" role="alert">
            {{ session ('loginError')}}
            <button type="button" class = "btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="mt-5 h3 mb-5 fw-normal text-center">Please sign in</h1>
            <form action="{{route('authenticate')}}" method="post">
                @csrf
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

                <div class="mt-3 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                    placeholder="name@example.com" autofocus required value="{{old('email')}}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedbaack">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mt-3 form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="mt-5 w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>
    </div>
</div>

@endsection