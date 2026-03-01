@extends('web.weblayout')
@section('title', 'مشاهدة المحاضرة')

@section('content')
<div class="video-player-page">
    <div class="video-player-page__inner">
        <div class="video-player-page__notice">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p class="video-player-page__notice-text">
                يُمنع التقاط <strong>لقطة شاشة</strong> أو <strong>تسجيل الفيديو</strong>؛ مخالفة ذلك تؤدي إلى حظر الحساب.
            </p>
        </div>
        <p class="video-player-page__hint">يرجى عدم تحديث الصفحة أثناء المشاهدة.</p>

        <div class="video-player-page__wrap">
            <video class="video-player-page__video" controls autoplay controlsList="nodownload" playsinline>
                <source id="videoSource" src="{{ route('videos.show2', $content_url) }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
            </video>
        </div>
    </div>
</div>

<script>
document.addEventListener('contextmenu', function(e) { e.preventDefault(); });
document.addEventListener('keydown', function(e) {
    if (e.keyCode === 123) e.preventDefault();
});
</script>
@endsection
