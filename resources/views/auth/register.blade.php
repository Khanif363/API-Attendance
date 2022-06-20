@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}




<div class="loginBox"> <img class="user" src="{{ asset('assets/dist/img/profile.png') }}" height="100px" width="100px">
    <h3>{{ __('Login') }}</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="">
            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" name="name" placeholder="Name" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <input id="name" class="form-control mt-3 @error('email') is-invalid @enderror" name="email" type="text" placeholder="Email" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <input id="password" class="form-control mt-3 @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <input id="password" class="form-control mt-3 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Password Konfirmasi" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
            <input type="submit" class="mt-4" name="" value="Register">
    </form>
    {{-- <a href="#">Forget Password<br></a> --}}
    <div class="text-center mt-4">
        <a href="{{ route('login') }}" style="color: #59238F;">Login</a>
    </div>

</div>
@endsection
