<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EZM - منصة الدورات الطبية')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="web-layout">
    {{-- شريط العلوي (قناة يوتيوب) --}}
    <div class="ezm-topbar">
        <a href="{{ $site?->youtube ?? '#' }}">الق نظرة على قناة اليوتيوب</a>
    </div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light ezm-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('logo.jpg') }}" alt="EZM" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('courses') ? 'active' : '' }}" href="{{ route('courses') }}">الدورات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">عن المنصة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.index') }}">الصفحة الشخصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">تواصل معنا</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center gap-2">
                        @guest
                            @if (Route::has('login'))
                                <a class="btn ezm-btn-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="dropdown">
                                <button type="button" class="btn btn-link nav-link dropdown-toggle p-0 border-0 text-dark text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fa-solid fa-user me-2"></i>الصفحة الشخصية</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>{{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="ezm-alerts-wrap">
        @if (session('success'))
            <div class="ezm-alert ezm-alert-success" id="ezm-alert-success" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" class="ezm-alert-close" onclick="this.closest('.ezm-alert').remove()" aria-label="إغلاق">&times;</button>
            </div>
        @endif
        @if ($errors->any())
            <div class="ezm-alert ezm-alert-danger" role="alert">
                <div>
                    <strong>يرجى تصحيح الأخطاء التالية:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="ezm-alert-close" onclick="this.closest('.ezm-alert').remove()" aria-label="إغلاق">&times;</button>
            </div>
        @endif
    </div>

    <main class="ezm-main">
        @yield('content')
    </main>

    <footer>
        <div class="ezm-footer">
            <div class="ezm-footer-brand">
                <p><img src="{{ asset('logo.jpg') }}" alt="EZM" width="40" height="40" /></p>
                <p>{{ $site?->gmail ?? '' }}</p>
                <p>{{ $site?->phone ?? '' }}</p>
                <p>منصة EZM للتعلم الطبي</p>
            </div>
            <div class="ezm-footer-links">
                <div>
                    <p><a href="{{ route('home') }}">الرئيسية</a></p>
                    <p><a href="{{ route('courses') }}">الدورات</a></p>
                    <p><a href="{{ route('about.index') }}">عن المنصة</a></p>
                </div>
                <div>
                    <p><a href="{{ route('contact.index') }}">تواصل معنا</a></p>
                    <p><a href="{{ route('about.index') }}">المزايا</a></p>
                    <p><a href="{{ route('about.index') }}">الأسئلة الشائعة</a></p>
                </div>
            </div>
            <div class="ezm-footer-social">
                <a href="{{ $site?->facebook ?? '#' }}" title="Facebook"><img src="{{ asset('facebook.png') }}" alt="Facebook" /></a>
                <a href="{{ $site?->linkedin ?? '#' }}" title="LinkedIn"><img src="{{ asset('linkedin.png') }}" alt="LinkedIn" /></a>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.accordion button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var expanded = this.getAttribute('aria-expanded') === 'true';
                document.querySelectorAll('.accordion button').forEach(function(b) { b.setAttribute('aria-expanded', 'false'); });
                this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            });
        });
    </script>
    {{-- Bootstrap JS يُحمّل عبر Vite (resources/js/app.js -> import 'bootstrap') --}}
</body>
</html>
