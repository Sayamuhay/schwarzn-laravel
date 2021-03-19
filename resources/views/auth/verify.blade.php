@extends('layouts.templateLogin')

@section('content')
<div class="d-flex justify-content-end">
<div class="col-md-4">
<div class="text-center panel">

        <div class="p-5">
            <div class="heading-section m-b-20">
        <h2 class="litt">Verify Your Email</h2>
        </div>

        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        <div class="text-danger mb-3">{{ __('Please check your email for a verification link.') }}</div>
        {{ __('Maybe we have sent an email verification to you. If you did not receive the email') }}
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn-pay mt-2 pt-2 pb-2 p-l-50 p-r-50">{{ __('click here to request another') }}</button>.
        </form>

  
</div>
</div>
</div>
@endsection
