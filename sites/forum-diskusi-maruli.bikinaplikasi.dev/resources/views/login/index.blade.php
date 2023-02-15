@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4">

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <h6 class=" mb-3 fw-normal text-center bg-warning">You are a Guest User, please login to get more
                    access</h6>
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="{{ url('login') }}" method="post">
                    @csrf

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control  @error('username')
                            is-invalid @enderror " id="username" placeholder="Username" required
                               value="{{ old('username') }}" autofocus>
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                               required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                </form>

                <small class="d-block text-center mt-3">Don't have account? please <a href="{{ url('register') }}">Register
                        Now</a></small>
            </main>
        </div>
    </div>


@endsection
