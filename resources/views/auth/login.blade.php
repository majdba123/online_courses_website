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
        <h1>تسجيل الدخول</h1>
        <h4>قم بتسجيل  الدخول  للوصول إلى الدورات</h4>
        <div class="tableoflogin">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <p class="nameoflogin">: البريد الالكتروني</p>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <p class="nameoflogin">: كلمة المرور</p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br />
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <p>تزكرني :</p>
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
            @endif
            <p class="Or">أو</p>
            <p class="Or">عن طريق غوغل<a href="{{ route('google.redirect') }}" > Login with Google </a></p>
            <p class="Or">هل تملك حساب؟<a href="{{ route('login') }}">قم بتسجيل الدخول</a></p
            </form>
        </div>
        </div>
    </div>

@endsection
