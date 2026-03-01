@extends('web.weblayout')
@section('title', 'الدورات | EZM - منصة الدورات الطبية')
@section('content')

<section class="courses-page">
    <div class="courses-page__inner">
        <header class="courses-page__header">
            <h1 class="courses-page__title">الدورات الطبية</h1>
            <p class="courses-page__lead">
                اختر من بين مجموعة دوراتنا المصممة لمساعدتك على تطوير مهاراتك الطبية مع أفضل الخبراء.
            </p>
        </header>

        @if($courses->isEmpty())
            <div class="courses-page__empty">
                <p>لا توجد دورات متاحة حالياً.</p>
            </div>
        @else
            <div class="courses-page__grid">
                @foreach($courses as $c)
                <article class="course-card">
                    <div class="course-card__head">
                        @auth
                        <form method="post" action="{{ route('store.fff', $c->id) }}" class="course-card__fav-form">
                            @csrf
                            <button type="submit" class="course-card__fav-btn" title="إضافة للمفضلة">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </form>
                        @endauth
                        <h2 class="course-card__title">
                            <a href="{{ route('video', $c->id) }}">{{ $c->name }}</a>
                        </h2>
                    </div>

                    <div class="course-card__meta">
                        @if($c->doctor)
                        <span class="course-card__meta-item"><i class="fa-solid fa-user-doctor"></i> {{ $c->doctor->name }}</span>
                        @endif
                        @if($c->time_of_course)
                        <span class="course-card__meta-item"><i class="fa-regular fa-clock"></i> {{ $c->time_of_course }}</span>
                        @endif
                        <span class="course-card__meta-item course-card__price"><i class="fa-solid fa-tag"></i> {{ $c->price }} ر.س</span>
                    </div>

                    <div class="course-card__desc">
                        <p>{{ Str::limit($c->discription, 160) }}</p>
                    </div>

                    @if($c->video && $c->video->isNotEmpty())
                    <div class="course-card__videos">
                        <span class="course-card__videos-label">المحتويات:</span>
                        <ul class="course-card__videos-list">
                            @foreach($c->video->take(5) as $v)
                            <li>
                                <a href="{{ route('generate_url', $v->id) }}">{{ $loop->iteration }}. {{ $v->name }}</a>
                            </li>
                            @endforeach
                            @if($c->video->count() > 5)
                            <li class="course-card__videos-more">+ {{ $c->video->count() - 5 }} محاضرة أخرى</li>
                            @endif
                        </ul>
                    </div>
                    @endif

                    <a href="{{ route('video', $c->id) }}" class="course-card__cta">عرض الدورة والمحتوى</a>
                </article>
                @endforeach
            </div>

            @if($courses->hasPages())
            <div class="courses-page__pagination">
                {!! $courses->links() !!}
            </div>
            @endif
        @endif
    </div>
</section>

@endsection
