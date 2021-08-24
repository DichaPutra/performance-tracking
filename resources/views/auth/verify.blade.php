@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please verify your email address.') }}
                    <!--{{ __('If you did not receive the email') }},--><br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to verify your email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
