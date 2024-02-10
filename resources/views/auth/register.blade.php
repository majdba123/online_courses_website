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
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <p class="nameoflogin">: البريد الالكتروني </p>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <br />
            <p class="nameoflogin">:  كلمة المرور </p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br />
            <p class="nameoflogin">:  تأكيد كلمة المرور  </p>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <br />
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
            <p class="Or">أو</p>
            <p class="Or">  <a href="{{ route('google.redirect') }}" > Login with Google </a></p>
            <p class="Or">هل تملك حساب؟<a href="{{ route('login') }}">قم بتسجيل الدخول</a></p
            </form>
        </div>
        </div>
    </div>

@endsection
