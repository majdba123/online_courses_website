@extends('web.weblayout')
@section('title', 'الرئيسية | EZM - منصة الدورات الطبية')
@section('content')

{{-- Hero --}}
<section class="home-hero">
    <div class="home-hero__inner">
        <p class="home-hero__badge">منصة تعليم طبي متخصصة</p>
        <h1 class="home-hero__title">
            نرافقك في رحلة <span class="home-hero__title-accent">التعلم الطبي</span>
        </h1>
        <p class="home-hero__subtitle">
            أفضل الدورات الطبية أينما كنت — تعلّم من أفضل الخبراء وطوّر مهاراتك
        </p>
        <a href="{{ route('courses') }}" class="home-hero__cta">تصفح الدورات</a>
    </div>
</section>

{{-- Intro video من يوتيوب — يعبّر عن نوع المنصة (تعليم طبي) --}}
@php
    $introVideoUrl = $site?->introduction ?? 'https://www.youtube.com/embed/5aww-Bpgkf4';
    if (str_contains($introVideoUrl, 'youtube.com/watch?v=')) {
        preg_match('/v=([a-zA-Z0-9_-]+)/', $introVideoUrl, $m);
        $introVideoUrl = isset($m[1]) ? 'https://www.youtube.com/embed/' . $m[1] : $introVideoUrl;
    }
@endphp
<section class="home-section home-video">
    <div class="home-section__inner">
        <h2 class="home-section__title">تعرف على المنصة</h2>
        <p class="home-section__lead">شاهد مقدمة عن التعليم الطبي وما تقدمه EZ Medicine</p>
        <div class="home-video__frame">
            <iframe src="{{ $introVideoUrl }}" title="تعرف على المنصة — تعليم طبي" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

{{-- Benefits --}}
<section class="home-section home-benefits">
    <div class="home-section__inner">
        <h2 class="home-section__title">ما مميزات EZ Medicine؟</h2>
        <p class="home-section__lead">اكتشف مزايا التعلم معنا</p>
        <div class="home-cards home-cards--benefits">
            @foreach($benefit as $item)
            <article class="home-card home-card--benefit">
                <span class="home-card__num">{{ ($benefit->currentPage() - 1) * $benefit->perPage() + $loop->iteration }}</span>
                <h3 class="home-card__title">{{ $item->title }}</h3>
                <p class="home-card__text">{{ $item->benefits }}</p>
            </article>
            @endforeach
        </div>
        @if($benefit->hasPages())
        <div class="home-pagination">
            {!! $benefit->links() !!}
        </div>
        @endif
    </div>
</section>

{{-- Courses --}}
<section class="home-section home-courses">
    <div class="home-section__inner">
        <h2 class="home-section__title">الدورات</h2>
        <p class="home-section__lead">اطّلع على مكتبتنا من الدورات الطبية المميزة</p>
        <div class="home-cards home-cards--courses">
            @foreach($course as $c)
            <article class="home-card home-card--course">
                <div class="home-card__head">
                    @auth
                    <form method="post" action="{{ route('store.fff', $c->id) }}" class="home-card__fav-form">
                        @csrf
                        <button type="submit" class="home-card__fav-btn" title="إضافة للمفضلة">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </form>
                    @endauth
                    <h3 class="home-card__title"><a href="{{ route('video', $c->id) }}">{{ $c->name }}</a></h3>
                </div>
                <p class="home-card__meta">
                    @if($c->doctor)
                    <span>الدكتور: {{ $c->doctor->name }}</span>
                    @endif
                    <span>السعر: {{ $c->price }} ر.س</span>
                </p>
                <p class="home-card__text home-card__desc">{{ Str::limit($c->discription, 120) }}</p>
                <a href="{{ route('video', $c->id) }}" class="home-card__cta">ابدأ التعلم</a>
            </article>
            @endforeach
        </div>
        @if($course->hasPages())
        <div class="home-pagination">
            {!! $course->links() !!}
        </div>
        @endif
    </div>
</section>

{{-- Testimonials --}}
<section class="home-section home-testimonials">
    <div class="home-section__inner">
        <h2 class="home-section__title">آراء الطلاب والأطباء</h2>
        <p class="home-section__lead">ما يقوله متعلمونا عن منصة EZ Medicine</p>
        <div class="home-cards home-cards--testimonials">
            @foreach($rate as $r)
            <article class="home-card home-card--testimonial">
                <p class="home-card__quote">"{{ $r->comment }}"</p>
                <div class="home-card__author">
                    @php $u = $r->user; $img = $u?->image ?? 'default.png'; $name = $u?->name ?? 'مستخدم'; @endphp
                    <img src="{{ asset('imageprfile/' . $img) }}" alt="" class="home-card__avatar" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($name) }}&size=48'" width="48" height="48" />
                    <span class="home-card__name">{{ $name }}</span>
                </div>
            </article>
            @endforeach
        </div>
        @if($rate->hasPages())
        <div class="home-pagination">
            {!! $rate->links() !!}
        </div>
        @endif
    </div>
</section>

{{-- FAQ --}}
<section class="home-section home-faq">
    <div class="home-section__inner home-faq__inner">
        <div class="home-faq__header">
            <h2 class="home-section__title">الأسئلة الشائعة</h2>
            <p class="home-section__lead">لديك سؤال آخر؟ <a href="{{ route('contact.index') }}">تواصل معنا</a></p>
        </div>
        <div class="home-accordion">
            @foreach($qfa as $q)
            <div class="home-accordion__item">
                <button type="button" class="home-accordion__btn" aria-expanded="false" aria-controls="faq-{{ $loop->index }}" id="faq-btn-{{ $loop->index }}">
                    <span class="home-accordion__title">{{ $q->quastion }}</span>
                    <span class="home-accordion__icon" aria-hidden="true"></span>
                </button>
                <div class="home-accordion__content" id="faq-{{ $loop->index }}" role="region" aria-labelledby="faq-btn-{{ $loop->index }}" hidden>
                    <p>{{ $q->answee }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.querySelectorAll('.home-accordion__btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var expanded = this.getAttribute('aria-expanded') === 'true';
        var region = document.getElementById(this.getAttribute('aria-controls'));
        this.setAttribute('aria-expanded', !expanded);
        if (region) region.hidden = expanded;
    });
});
</script>
@endsection
