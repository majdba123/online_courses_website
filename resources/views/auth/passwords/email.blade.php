@extends('web.weblayout')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 tablex">
        <div class="panel panel-default">
        <div class="panel-body">
            <div class="text-center">
            <h3>EZM</h3>
            <h3 class="text-center">Forgot Password?</h3>
            <h4>You can reset your password here.</h4>
            <div class="panel-body">
                <form
                    action="{{ route('password.email') }}"
                    class="form"
                    method="post"
                >
                @csrf
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"
                        ><i
                        class="glyphicon glyphicon-envelope color-blue"
                        ></i
                    ></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
@endsection
<style>
.panel-body {
    padding: 3600px;
  }
  .tablex {
    padding-top: 100px;
  }
  <style>
    .mainDiv {
      display: flex;
      min-height: 100%;
      align-items: center;
      justify-content: center;
      background-color: #f9f9f9;
      font-family: "Open Sans", sans-serif;
    }
    .cardStyle {
      width: 500px;
      border-color: white;
      background: #fff;
      padding: 36px 0;
      border-radius: 4px;
      margin: 30px 0;
      box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
    }
    signupLogo
    {
      max-height: 100px;
      margin: auto;
      display: flex;
      flex-direction: column;
    }
    .formTitle {
      font-weight: 600;
      margin-top: 20px;
      color: #2f2d3b;
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
      font-size: 16px;
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
    .submitButton {
      width: 70%;
      height: 40px;
      margin: auto;
      display: block;
      color: #fff;
      background-color: #065492;
      border-color: #065492;
      text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
      box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }
    .submitButton:disabled,
    button[disabled] {
      border: 1px solid #cccccc;
      background-color: #cccccc;
      color: #666666;
    }

    loader
    {
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
</style>


