<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة التحكم') | EZM</title>
    <link rel="shortcut icon" href="{{ asset('logo.jpg') }}" type="image/jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="admin-body">

<div class="admin-wrap">
    {{-- شريط علوي --}}
    <header class="admin-navbar">
        <button type="button" class="admin-navbar__toggler d-lg-none" id="adminSidebarToggler" aria-controls="adminSidebar" aria-label="القائمة">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="admin-navbar__brand" href="{{ route('index.Admin') }}">
            <img src="{{ asset('logo.jpg') }}" alt="EZM" width="36" height="36" />
            <span class="admin-navbar__title">لوحة تحكم EZM</span>
        </a>
        <div class="admin-navbar__end">
            <a href="{{ url('/') }}" class="admin-navbar__link" target="_blank" rel="noopener">
                <i class="fa-solid fa-external-link-alt"></i> الموقع
            </a>
            <span class="admin-navbar__user">
                <i class="fa-solid fa-user-shield"></i>
                {{ Auth::user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="admin-navbar__logout">
                    <i class="fa-solid fa-right-from-bracket"></i> خروج
                </button>
            </form>
        </div>
    </header>

    <div class="admin-main-wrap">
        {{-- القائمة الجانبية --}}
        <div class="admin-sidebar-backdrop d-lg-none" id="adminSidebarBackdrop" aria-hidden="true"></div>
        <aside class="admin-sidebar" id="adminSidebar" aria-labelledby="adminSidebarLabel">
            <div class="admin-sidebar__head d-lg-none">
                <h5 id="adminSidebarLabel" class="admin-sidebar__title">القائمة</h5>
                <button type="button" class="admin-sidebar__close btn-close" id="adminSidebarClose" aria-label="إغلاق"></button>
            </div>
            <nav class="admin-sidebar__nav">
                <a class="admin-sidebar__link {{ request()->routeIs('index.Admin') ? 'admin-sidebar__link--active' : '' }}" href="{{ route('index.Admin') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>لوحة التحكم</span>
                </a>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-courses" aria-expanded="false">
                        <i class="fa-solid fa-book-medical"></i>
                        <span>إدارة الدورات</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-courses">
                        <a class="admin-sidebar__sublink" href="{{ route('index.doctor') }}">الأطباء</a>
                        <a class="admin-sidebar__sublink" href="{{ route('index.Discount') }}">العروض</a>
                        <a class="admin-sidebar__sublink" href="{{ route('index.courses') }}">الدورات</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-video" aria-expanded="false">
                        <i class="fa-solid fa-video"></i>
                        <span>إدارة الفيديو</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-video">
                        <a class="admin-sidebar__sublink" href="{{ route('index.video') }}">الفيديوهات</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-web" aria-expanded="false">
                        <i class="fa-solid fa-globe"></i>
                        <span>إدارة الموقع</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-web">
                        <a class="admin-sidebar__sublink" href="{{ route('benefit.index') }}">المزايا</a>
                        <a class="admin-sidebar__sublink" href="{{ route('qfa.index') }}">الأسئلة الشائعة</a>
                        <a class="admin-sidebar__sublink" href="{{ route('goal.index') }}">الأهداف</a>
                        <a class="admin-sidebar__sublink" href="{{ route('achievement.index') }}">الإنجازات</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-rating" aria-expanded="false">
                        <i class="fa-solid fa-star"></i>
                        <span>التقييمات</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-rating">
                        <a class="admin-sidebar__sublink" href="{{ route('index.rate') }}">التقييمات</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-inquire" aria-expanded="false">
                        <i class="fa-solid fa-envelope"></i>
                        <span>الاستفسارات</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-inquire">
                        <a class="admin-sidebar__sublink" href="{{ route('index.inquire') }}">الرسائل</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-order" aria-expanded="false">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span>الطلبات</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-order">
                        <a class="admin-sidebar__sublink" href="{{ route('index.orders') }}">الطلبات</a>
                    </div>
                </div>

                <div class="admin-sidebar__group">
                    <button class="admin-sidebar__group-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-user" aria-expanded="false">
                        <i class="fa-solid fa-users"></i>
                        <span>المستخدمون</span>
                        <i class="fa-solid fa-chevron-down admin-sidebar__chevron"></i>
                    </button>
                    <div class="collapse" id="menu-user">
                        <a class="admin-sidebar__sublink" href="{{ route('user.index') }}">المستخدمون</a>
                    </div>
                </div>
            </nav>
        </aside>

        {{-- المحتوى الرئيسي --}}
        <main class="admin-main">
            <div class="admin-content">
                @if (session('success'))
                <div class="admin-alert admin-alert--success" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="admin-alert__close" data-bs-dismiss="alert" aria-label="إغلاق">&times;</button>
                </div>
                @endif
                @if (session('error'))
                <div class="admin-alert admin-alert--danger" role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="admin-alert__close" data-bs-dismiss="alert" aria-label="إغلاق">&times;</button>
                </div>
                @endif
                @if ($errors->any())
                <div class="admin-alert admin-alert--danger" role="alert">
                    <strong>يرجى تصحيح الأخطاء:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</div>

<script>
(function() {
    var sidebar = document.getElementById('adminSidebar');
    var toggler = document.getElementById('adminSidebarToggler');
    var closeBtn = document.getElementById('adminSidebarClose');
    var backdrop = document.getElementById('adminSidebarBackdrop');
    if (sidebar && toggler) {
        toggler.addEventListener('click', function() {
            sidebar.classList.add('admin-sidebar--open');
            if (backdrop) backdrop.classList.add('show');
            document.body.classList.add('admin-sidebar-open');
        });
    }
    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('admin-sidebar--open');
        if (backdrop) backdrop.classList.remove('show');
        document.body.classList.remove('admin-sidebar-open');
    }
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (backdrop) backdrop.addEventListener('click', closeSidebar);
})();
</script>
</body>
</html>
