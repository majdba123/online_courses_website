@extends('web.weblayout')
@section('title', 'تسجيل الدخول | EZM')
@section('content')

<section class="auth-page">
    <div class="auth-page__inner">
        <div class="auth-card">
            <header class="auth-card__header">
                <h1 class="auth-card__title">تسجيل الدخول</h1>
                <p class="auth-card__subtitle">سجّل دخولك للوصول إلى الدورات ومتابعة التعلم</p>
            </header>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="auth-form__group">
                    <label for="email" class="auth-form__label">البريد الإلكتروني</label>
                    <input id="email" type="email" class="auth-form__input @error('email') auth-form__input--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email.com" />
                    @error('email')
                    <span class="auth-form__error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-form__group">
                    <label for="password" class="auth-form__label">كلمة المرور</label>
                    <input id="password" type="password" class="auth-form__input @error('password') auth-form__input--error @enderror" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    @error('password')
                    <span class="auth-form__error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-form__row">
                    <label class="auth-form__checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <span>تذكرني</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-form__link">نسيت كلمة المرور؟</a>
                    @endif
                </div>

                <button type="submit" class="auth-form__submit">{{ __('Login') }}</button>
            </form>

            @if (Route::has('google.redirect'))
            <div class="auth-card__divider">
                <span>أو</span>
            </div>
            <a href="{{ route('google.redirect') }}" class="auth-form__google">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="24" height="24" alt="" loading="lazy" />
                <span>الدخول بحساب Google</span>
            </a>
            @endif

            <p class="auth-card__footer">
                لا تملك حساباً؟ <a href="{{ route('register') }}">سجّل الآن</a>
            </p>
        </div>
    </div>
</section>

@endsection
