@extends('web.weblayout')
@section('title', 'إنشاء حساب | EZM')
@section('content')

<section class="auth-page">
    <div class="auth-page__inner">
        <div class="auth-card">
            <header class="auth-card__header">
                <h1 class="auth-card__title">إنشاء حساب</h1>
                <p class="auth-card__subtitle">أنشئ حسابك للوصول إلى الدورات ومتابعة التعلم</p>
            </header>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="auth-form__group">
                    <label for="name" class="auth-form__label">الاسم</label>
                    <input id="name" type="text" class="auth-form__input @error('name') auth-form__input--error @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="الاسم الكامل" />
                    @error('name')
                    <span class="auth-form__error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-form__group">
                    <label for="email" class="auth-form__label">البريد الإلكتروني</label>
                    <input id="email" type="email" class="auth-form__input @error('email') auth-form__input--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@email.com" />
                    @error('email')
                    <span class="auth-form__error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-form__group">
                    <label for="password" class="auth-form__label">كلمة المرور</label>
                    <input id="password" type="password" class="auth-form__input @error('password') auth-form__input--error @enderror" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    @error('password')
                    <span class="auth-form__error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-form__group">
                    <label for="password-confirm" class="auth-form__label">تأكيد كلمة المرور</label>
                    <input id="password-confirm" type="password" class="auth-form__input" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                </div>

                <button type="submit" class="auth-form__submit">{{ __('Register') }}</button>
            </form>

            @if (Route::has('google.redirect'))
            <div class="auth-card__divider">
                <span>أو</span>
            </div>
            <a href="{{ route('google.redirect') }}" class="auth-form__google">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="24" height="24" alt="" loading="lazy" />
                <span>التسجيل بحساب Google</span>
            </a>
            @endif

            <p class="auth-card__footer">
                لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجّل الدخول</a>
            </p>
        </div>
    </div>
</section>

@endsection
