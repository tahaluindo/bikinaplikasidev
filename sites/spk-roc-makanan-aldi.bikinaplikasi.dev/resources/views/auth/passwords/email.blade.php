@extends('layouts.matrix-admin.auth')
@section('content')

<div class="auth-box bg-dark border-top border-secondary">
    <div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="text-center">
            <span class="text-white">Masukkan e-mail yang telah terdaftar.</span>
        </div>
        <div class="row m-t-20">
            <form class="col-12" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i
                                class="ti-email"></i></span>
                    </div>
                    <input type="email" name='email'
                        class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email"
                        aria-label="Email" aria-describedby="basic-addon1" required="" value="{{ old('email') }}"
                        autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row m-t-20 p-t-20 border-top border-secondary">
                    <div class="col-12">
                        <a class="btn btn-success" href="{{ route('login') }}" name="action">Back To
                            Login</a>
                        <button class="btn btn-info float-right" type="submit" name="action">Recover</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
