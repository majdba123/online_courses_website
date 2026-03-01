@extends('web.weblayout')
@section('title', 'تواصل معنا | EZM')
@section('content')

<section class="contact-page">
    {{-- Hero --}}
    <header class="contact-hero">
        <div class="contact-hero__inner">
            <span class="contact-hero__badge">دعمك أولاً</span>
            <h1 class="contact-hero__title">تواصل معنا</h1>
            <p class="contact-hero__lead">
                نسعد بتواصلك. أرسل استفسارك أو اقتراحك وسنرد عليك في أقرب وقت ممكن.
            </p>
        </div>
    </header>

    <div class="contact-page__inner">
        <div class="contact-page__grid">
            {{-- النموذج --}}
            <div class="contact-form-section">
                <div class="contact-form-wrap">
                    <div class="contact-form-wrap__header">
                        <span class="contact-form-wrap__icon"><i class="fa-solid fa-paper-plane"></i></span>
                        <h2 class="contact-form-wrap__title">أرسل رسالتك</h2>
                        <p class="contact-form-wrap__subtitle">املأ الحقول وسنتواصل معك قريباً</p>
                    </div>

                    @guest
                    <div class="contact-form__guest-card">
                        <i class="fa-solid fa-lock"></i>
                        <p>يجب تسجيل الدخول لإرسال النموذج.</p>
                        <a href="{{ route('login') }}" class="contact-form__guest-btn">تسجيل الدخول</a>
                    </div>
                    @endguest

                    @auth
                    <form action="{{ route('store.contact') }}" method="post" class="contact-form">
                        @csrf
                        <div class="contact-form__group">
                            <label for="contact-email" class="contact-form__label">البريد الإلكتروني</label>
                            <input type="email" name="email" id="contact-email" class="contact-form__input @error('email') contact-form__input--error @enderror" value="{{ old('email', auth()->user()->email) }}" required placeholder="example@email.com" />
                            @error('email')
                            <span class="contact-form__error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="contact-form__group">
                            <label for="contact-subject" class="contact-form__label">الموضوع</label>
                            <input type="text" name="subject" id="contact-subject" class="contact-form__input @error('subject') contact-form__input--error @enderror" value="{{ old('subject') }}" required placeholder="موضوع الرسالة" maxlength="255" />
                            @error('subject')
                            <span class="contact-form__error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="contact-form__group">
                            <label for="contact-message" class="contact-form__label">الرسالة</label>
                            <textarea name="discription" id="contact-message" class="contact-form__textarea @error('discription') contact-form__input--error @enderror" rows="5" required placeholder="اكتب رسالتك هنا...">{{ old('discription') }}</textarea>
                            @error('discription')
                            <span class="contact-form__error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="contact-form__submit">
                            <i class="fa-solid fa-paper-plane"></i>
                            <span>إرسال الرسالة</span>
                        </button>
                        <p class="contact-form__hint">نهدف للرد خلال 24 ساعة خلال أيام العمل</p>
                    </form>
                    @endauth
                </div>
            </div>

            {{-- معلومات التواصل --}}
            <aside class="contact-info">
                <div class="contact-info__intro">
                    <h2 class="contact-info__heading">معلومات التواصل</h2>
                    <p class="contact-info__intro-text">يمكنك أيضاً الوصول إلينا عبر القنوات التالية</p>
                </div>
                <div class="contact-info__card contact-info__card--email">
                    <div class="contact-info__icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h3 class="contact-info__title">البريد الإلكتروني</h3>
                    <p class="contact-info__text">{{ $site?->gmail ?? '—' }}</p>
                    @if($site?->gmail)
                    <a href="mailto:{{ $site->gmail }}" class="contact-info__action">إرسال بريد</a>
                    @endif
                </div>
                <div class="contact-info__card contact-info__card--phone">
                    <div class="contact-info__icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h3 class="contact-info__title">الهاتف</h3>
                    <p class="contact-info__text">{{ $site?->phone ?? '—' }}</p>
                    @if($site?->phone)
                    <a href="tel:{{ $site->phone }}" class="contact-info__action">اتصال</a>
                    @endif
                </div>
                <div class="contact-info__card contact-info__card--social">
                    <div class="contact-info__icon">
                        <i class="fa-solid fa-share-nodes"></i>
                    </div>
                    <h3 class="contact-info__title">وسائل التواصل</h3>
                    <div class="contact-info__links">
                        @if($site?->facebook)
                        <a href="{{ $site->facebook }}" target="_blank" rel="noopener" class="contact-info__link"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
                        @endif
                        @if($site?->linkedin)
                        <a href="{{ $site->linkedin }}" target="_blank" rel="noopener" class="contact-info__link"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
