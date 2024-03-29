@extends('web.weblayout')

@section('content')
<div class="bodypage">
    <div class="descreption">
        <h2>Students Testimonials</h2>
        <p>
            Lorem ipsum dolor sit amet consectur. Tempus tincidunt etiam eget elit
            imperdiet et. Cras eu sit dignissim lorem nibh et. Ac habitasse in
            velit fringilla feugiat senectus in
        </p>
        <div class="comment">
            <p>
                The web design course pronided a solid foundation for me. The
                instructors were knowledgeable and supportive, and the interactive
                learning environment was engagion. I highly recommend it!
            </p>
        </div>
    </div>

    <div class="Loginbody">
        <h1>إنشاء حساب</h1>
        <h4>قم بإنشاء حساب للوصول إلى الدورات</h4>
        <div class="tableoflogin">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <p class="nameoflogin">: الاسم</p>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <p class="nameoflogin">: البريد الالكتروني </p>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br />
                <p class="nameoflogin">: كلمة المرور </p>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br />
                <p class="nameoflogin">: تأكيد كلمة المرور </p>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                <br />
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <p class="Or">أو</p>
                <p class="Or"> <a class="gmail" href="{{ route('google.redirect') }}"> <img
                            src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                        <span>Login with Google</span>
                    </a></p>
                <p class="Or">هل تملك حساب؟<a href="{{ route('login') }}">قم بتسجيل الدخول</a></p </form>
        </div>
    </div>
</div>

@endsection
<style>
    .gmail {
        padding: 0.5rem 1rem;
        border: 1px solid #718096;
        display: flex;
        gap: 0.5rem;
        border-radius: 0.375rem;
        color: #718096;
        transition: all 0.15s ease-in-out;
        text-align: right;
    }

    .gmail:hover {
        border-color: #CBD5E0;
        color: #2d3748;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .gmail img {
        width: 1.5rem;
        height: 1.5rem;
    }

    .bodypage {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 100px 200px;
        background-color: #eeeeee;
    }

    .Loginbody {
        background-color: white;
        padding: 30px;
        border-radius: 5px;
    }

    .bodypage h1 {
        text-align: center;
        margin: auto;
    }

    .bodypage h4 {
        text-align: center;
        margin: auto;
        font-weight: 300;
        padding-bottom: 20px;
    }

    .tableoflogin .nameoflogin {
        text-align: right;
        padding-right: 7px;
    }

    .remember {
        text-align: right !important;
        padding-right: 7px;
    }

    input[type="email"],
    input[type="password"] {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 360px;
        border-radius: 5px;
        text-align: right;
        background-color: #eeeeee;
    }

    button[type="submit"] {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 360px;
        border-radius: 5px;
        background-color: #00aeef;
        color: white;
    }

    .aaa {
        padding: 7px;
        font-size: 16px;
        width: 360px;
        border-radius: 5px;
        background-color: #00aeef;
        color: white;
        text-decoration: none;
        text-align: center;
    }

    .password a {
        text-decoration: none;
        color: black;
    }

    .Or {
        text-align: center;
    }

    .Ors {
        padding: 7px;
        font-size: 16px;
        width: 360px;
        border-radius: 5px;
        color: black;
        text-decoration: none;
        text-align: center;
        background-color: #eeeeee;
    }

    .descreption {
        margin-right: 150px;
        padding-bottom: 70px;
    }

    .descreption p {
        font-size: 15px;
    }

    .comment {
        padding-top: 50px;
        padding-left: 50px;
    }

    @media screen and (max-width: 500px) {
        h1 {
            font-size: 20px;
        }

        .bodypage {
            padding: 0px;
            display: block;

        }

        .descreption,
        .comment {
            padding: 0px;
            margin: 0px;
        }




    }
</style>
