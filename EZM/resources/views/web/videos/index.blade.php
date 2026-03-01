@extends('web.weblayout')
@section('title', $course->name . ' | محتوى الدورة')

@section('content')
<div class="videos-page">
    <div class="videos-page__inner">
        <a href="{{ route('courses') }}" class="videos-page__back">
            <i class="fa-solid fa-arrow-right"></i> جميع الدورات
        </a>

        <header class="videos-page__header">
            <h1 class="videos-page__title">{{ $course->name }}</h1>
            @if($course->doctor)
            <p class="videos-page__meta">
                <i class="fa-solid fa-user-md"></i> الدكتور: {{ $course->doctor->name }}
            </p>
            @endif
        </header>

        <section class="videos-page__section">
            <h2 class="videos-page__section-title">
                <i class="fa-solid fa-play-circle"></i> محاضرات الدورة
            </h2>
            @if($video->isNotEmpty())
                <ul class="videos-list">
                    @foreach($video as $v)
                    <li class="videos-list__item">
                        <span class="videos-list__num">{{ ($video->currentPage() - 1) * $video->perPage() + $loop->iteration }}</span>
                        <a href="{{ route('generate_url', $v->id) }}" class="videos-list__link">
                            <i class="fa-solid fa-video"></i>
                            <span>{{ $v->name }}</span>
                        </a>
                        @if($v->discription)
                        <p class="videos-list__desc">{{ Str::limit(strip_tags($v->discription), 120) }}</p>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <div class="videos-page__pagination">
                    {!! $video->links() !!}
                </div>
            @else
                <p class="videos-page__empty">لا توجد محاضرات مسجلة لهذه الدورة بعد.</p>
            @endif
        </section>

        <section class="videos-page__section videos-page__ratings">
            <h2 class="videos-page__section-title">
                <i class="fa-solid fa-star"></i> التقييمات والآراء
            </h2>
            <form action="{{ route('store.rate', $id_course) }}" method="POST" class="videos-rate-form">
                @csrf
                <div class="videos-rate-form__row">
                    <input type="text" name="comment" class="videos-rate-form__input" placeholder="اكتب تعليقك أو تقييمك للدورة..." value="{{ old('comment') }}" />
                    <button type="submit" class="videos-rate-form__btn">
                        <i class="fa-solid fa-paper-plane"></i> إرسال
                    </button>
                </div>
            </form>
            <div class="videos-ratings-list">
                @forelse($rating as $r)
                <article class="videos-rating-card">
                    <div class="videos-rating-card__avatar">
                        @php $u = $r->user; $img = $u->image ?? 'profile.jpg'; @endphp
                        <img src="{{ asset('imageprfile/' . $img) }}" alt="" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($u->name ?? '') }}&size=48'" width="48" height="48" />
                    </div>
                    <div class="videos-rating-card__body">
                        <strong class="videos-rating-card__name">{{ $r->user->name ?? 'مستخدم' }}</strong>
                        <p class="videos-rating-card__text">{{ $r->comment }}</p>
                    </div>
                </article>
                @empty
                <p class="videos-page__empty">لا توجد تقييمات حتى الآن. كن أول من يقيّم.</p>
                @endforelse
            </div>
            @if($rating->hasPages())
            <div class="videos-page__pagination">
                {!! $rating->links() !!}
            </div>
            @endif
        </section>
    </div>
</div>
@endsection
