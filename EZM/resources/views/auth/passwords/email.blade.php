@extends('web.weblayout')

@section('content')
<div class="ali">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="background">



    <div class="row">
        <div class="col-md-6 col-md-offset-3 tablex">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3>EZM</h3>
                        <h3 class="text-center">Forgot Password?</h3>
                        <h4>You can reset your password here.</h4>
                        <div class="panel-body">
                            <form action="{{ route('password.email') }}" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control" @error('email') is-invalid
                                            @enderror name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        {{ __('Send Link') }}
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
<style>
    .ali {
        background-color: #eeeeee;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .tablex {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .panel-body {
        padding: 15px;
    }

    .text-center {
        text-align: center !important;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .background {
        background-color: #eeeeee;


        justify-content: space-between;
        align-items: center;
        padding: 80px 150px 10px 600px;
    }

    @media screen and (max-width: 500px) {


        .background {
            padding: 0px;

        }
    }

    .input-group-addon {
        padding: 10px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
</style>
