@extends('layouts.templateLogin')

@section('content')
<div class="d-flex justify-content-end">
<div class="col-md-4">
<div class="text-center panel">
    <form action="{{ route('register') }}" method="post">
    @csrf

        <div class="p-4">
            <div class="heading-section m-b-20">
        <h2 class="centered mt-0">Register</h2>
        </div>

        <!-- Email -->
        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" id="addon-wrapping">Username</span>
            <input type="text" class="form-control bor10 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" id="addon-wrapping">Email</span>
            <input type="email" class="form-control bor10 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Password -->
        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" id="addon-wrapping">Password</span>
            <input type="password" class="form-control bor10 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" style="width: 170px;" id="addon-wrapping">{{ __('Confirm Password') }}</span>
            <input id="password-confirm" type="password" class="form-control bor10" name="password_confirmation" required autocomplete="new-password"/>
        </div>

        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" id="addon-wrapping">Gender</span>
            <select name="gender" id="gender" class="form-control1 bor10 w-full">
                <option value="">Choose One</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <!-- Register button -->
        <button class="btn-pay mt-5 pt-2 pb-2 p-l-50 p-r-50 waves-effect waves-light" type="submit">{{ __('Register') }}</button>

        </div>
        <!-- Register -->
        <div class="card-footer m-t-80">

        <p class="mt-3">Already Registered?
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
        </p>

        <!-- Social login -->
        {{-- <p>or sign in with:</p>

        <a type="button" class="light-blue-text mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
          <i class="fab fa-twitter"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
          <i class="fab fa-github"></i>
        </a>
        </div> --}}

    </form>
</div>
</div>
</div>
@endsection