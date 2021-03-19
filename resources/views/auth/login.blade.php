@extends('layouts.templateLogin')

@section('content')
<div class="d-flex justify-content-end" id="login-register-panel">
<div class="col-md-4">
<div class="text-center panel">
  <form action="{{ route('login') }}" method="post">
    @csrf
        <div class="p-5">
            <div class="heading-section m-b-20">
        <h2 class="litt">Log in</h2>
        </div>

        <!-- Email -->
          <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text bor10 bg10" id="addon-wrapping">Email</span>
            <input type="email" class="form-control bor10  @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>


        <!-- Password -->
        <div class="input-group mb-3 flex-nowrap">
          <span class="input-group-text bor10 bg10" id="addon-wrapping">Password</span>
          <input type="password" class="form-control bor10 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
          @error('password')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
           @enderror
        </div>


        <div class="d-flex justify-content-between mt-5">

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
              </div>
            </div>
          </div>

        </div>

        <!-- Sign in button -->
        <button class="btn-pay mt-5 pt-2 pb-2 p-l-50 p-r-50 waves-effect waves-light" type="submit">Sign in</button>

        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

        </form>
        </div>
        <!-- Register -->
        <div class="card-footer m-t-40">

        <p class="mt-3">Didn't have an account?
        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
        @endif
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
        </a> --}}
        </div>
</div>
</div>
</div>
@endsection
