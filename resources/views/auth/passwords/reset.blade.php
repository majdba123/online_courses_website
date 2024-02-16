@extends('web.weblayout')

@section('content')

<div class="mainDiv">
    <div class="cardStyle">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">


            <h2 class="formTitle">EZM</h2>
            <div class="inputDiv">
                <label class="inputLabel" for="password">Email</label>
                <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="inputDiv">
                <label class="inputLabel" for="password">New Password</label>
                <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="inputDiv">
                <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">

            </div>

            <div class="inputDiv">
                <div class="buttonWrapper">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button></div>
            </div>
        </form>
    </div>
</div>

@endsection
<style>
    .mainDiv {
        display: flex;
        min-height: 100%;
        align-items: center;
        justify-content: center;
        padding-bottom: 200px;


    }

    .cardStyle {
        width: 400px;
        border-color: white;
        background: white;
        padding: 36px 0;
        border-radius: 4px;
        box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
    }

    .signupLogo {
        max-height: 100px;
        margin: auto;
        display: flex;
        flex-direction: column;
    }

    .formTitle {
        font-weight: 600;
        margin-top: 20px;
        color: black;
        text-align: center;
    }

    .inputLabel {
        font-size: 12px;
        color: #555;
        margin-bottom: 6px;
        margin-top: 24px;
    }

    .inputDiv {
        width: 70%;
        display: flex;
        flex-direction: column;
        margin: auto;

    }

    input {
        height: 40px;
        font-size: 16px !important;
        border-radius: 4px;
        border: none;
        border: solid 1px #ccc;
        padding: 0 11px;
    }

    input:disabled {
        cursor: not-allowed;
        border: solid 1px #eee;
    }

    .buttonWrapper {
        margin-top: 40px;
    }

    button {

        width: 100%;
        height: 40px;
        margin: auto;
        display: block;
        color: #fff;
        background-color: #065492;
        border-color: #065492;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
        border-radius: 4px;
        font-size: 14px !important;
        cursor: pointer;
    }


    .loader {
        position: absolute;
        z-index: 1;
        margin: -2px 0 0 10px;
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid #666666;
        width: 14px;
        height: 14px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<script>
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirmPassword");

    enableSubmitButton();

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            return false;
        } else {
            confirm_password.setCustomValidity("");
            return true;
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    function enableSubmitButton() {
        document.getElementById("submitButton").disabled = false;
        document.getElementById("loader").style.display = "none";
    }

    function disableSubmitButton() {
        document.getElementById("submitButton").disabled = true;
        document.getElementById("loader").style.display = "unset";
    }

    function validateSignupForm() {
        var form = document.getElementById("signupForm");

        for (var i = 0; i < form.elements.length; i++) {
            if (
                form.elements[i].value === "" &&
                form.elements[i].hasAttribute("required")
            ) {
                console.log("There are some required fields!");
                return false;
            }
        }

        if (!validatePassword()) {
            return false;
        }

        onSignup();
    }

    function onSignup() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            disableSubmitButton();

            if (this.readyState == 4 && this.status == 200) {
                enableSubmitButton();
            } else {
                console.log("AJAX call failed!");
                setTimeout(function () {
                    enableSubmitButton();
                }, 1000);
            }
        };

        xhttp.open("GET", "ajax_info.txt", true);
        xhttp.send();
    }
</script>
