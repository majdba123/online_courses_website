@extends('web.weblayout')

@section('content')
<div class="background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to
                                request
                                another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    button,
    .card-body,
    .card-header {
        font-size: 20px !important;
    }

    .container {
        padding-bottom: 100px;
    }

    .background {
        background-color: #eeeeee;


        justify-content: space-between;
        align-items: center;
        padding: 80px 150px 10px 150px;
    }
    @media screen and (max-width: 500px) {


.background {
    padding: 0px;

}
}
</style>
