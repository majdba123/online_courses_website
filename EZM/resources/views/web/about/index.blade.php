@extends('web.weblayout')
@section('title', 'عن المنصة | EZM - منصة الدورات الطبية')
@section('content')

<section class="about-page">
    {{-- Intro --}}
    <header class="about-hero">
        <div class="about-hero__inner">
            <h1 class="about-hero__title">عن EZM</h1>
            <p class="about-hero__lead">
                منصة متخصصة في تمكين المتعلمين من إتقان المعرفة الطبية. نقدم مجموعة واسعة من الدورات المصممة لتزويدكم بالمهارات والمعرفة اللازمة في المشهد الطبي المتطور.
            </p>
        </div>
    </header>

    {{-- Achievements --}}
    <section class="about-section about-achievements">
        <div class="about-section__inner">
            <h2 class="about-section__title">إنجازاتنا</h2>
            <p class="about-section__lead">
                التزامنا بالتميز قادنا إلى تحقيق milestones مهمة. إليك أبرز إنجازاتنا.
            </p>
            @if($achievement->isEmpty())
                <p class="about-section__empty">لا توجد إنجازات معروضة حالياً.</p>
            @else
                <div class="about-cards">
                    @foreach($achievement as $item)
                    <article class="about-card">
                        <div class="about-card__icon">
                            <img src="{{ asset('logo.jpg') }}" alt="" width="48" height="48" />
                        </div>
                        <h3 class="about-card__title">{{ $item->title }}</h3>
                        <p class="about-card__text">{{ $item->achievement }}</p>
                    </article>
                    @endforeach
                </div>
                @if($achievement->hasPages())
                <div class="about-pagination">
                    {!! $achievement->links() !!}
                </div>
                @endif
            @endif
        </div>
    </section>

    {{-- Goals --}}
    <section class="about-section about-goals">
        <div class="about-section__inner">
            <h2 class="about-section__title">أهدافنا</h2>
            <p class="about-section__lead">
                نهدف إلى تمكين الأفراد من مختلف الخلفيات من النجاح في المجال الطبي. نؤمن بأن التعليم يجب أن يكون متاحاً ومُغيّراً للحياة.
            </p>
            @if($goal->isEmpty())
                <p class="about-section__empty">لا توجد أهداف معروضة حالياً.</p>
            @else
                <div class="about-cards">
                    @foreach($goal as $item)
                    <article class="about-card">
                        <div class="about-card__icon">
                            <img src="{{ asset('logo.jpg') }}" alt="" width="48" height="48" />
                        </div>
                        <h3 class="about-card__title">{{ $item->title }}</h3>
                        <p class="about-card__text">{{ $item->golas }}</p>
                    </article>
                    @endforeach
                </div>
                @if($goal->hasPages())
                <div class="about-pagination">
                    {!! $goal->links() !!}
                </div>
                @endif
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="about-cta">
        <div class="about-cta__inner">
            <h2 class="about-cta__title"><span class="about-cta__highlight">معاً</span>، نُشكّل مستقبل التعلّم الطبي</h2>
            <p class="about-cta__lead">انضم إلينا في رحلة التعلّم واطلق إمكاناتك في الطب والتطوير المهني.</p>
            <a href="{{ route('register') }}" class="about-cta__btn">انضم الآن</a>
        </div>
    </section>
</section>

@endsection
