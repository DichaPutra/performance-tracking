@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfromance Tracking') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('Success ! process has been executed.') }}<br>
                        <form class="d-inline" method="GET" action="{{ route('login') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Proceed to Dashboard') }}</button>.
                        </form>
                    </div>

                    <!--                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},-->
<!--                    <form class="d-inline" method="GET" action="{{ route('login') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to login') }}</button>.
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
