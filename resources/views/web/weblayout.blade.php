<html>

<head>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->


    <link href="https://db.onlinewebfonts.com/c/dee436f274c410c23fc3de43367ef1ae?family=Janna+LT" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/dee436f274c410c23fc3de43367ef1ae?family=Janna+LT" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EZM</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="youtube"><a href="{{ DB::table('webs')->where('id', 1)->value('youtube') }}">الق نظرة على قناة
                اليوتيوب</a></div>
        <nav class="asasasas navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class=" asqwqw nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"> الرئيسية</a>
                        </li>
                        <li class="asqwqw nav-item">
                            <a class="  nav-link active" aria-current="page" href="{{ route('courses') }}"> الدورات</a>
                        </li>
                        <li class=" asqwqw nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}"> عن
                                المنصة</a>
                        </li>
                        <li class="asqwqw nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('profile.index') }}"> الصفحة
                                الشخصية </a>
                        </li>
                        <li class=" asqwqw nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('contact.index') }}"> تواصل
                                معنا</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        @guest
                        @if (Route::has('login'))
                        <li class="asqwqw navbar">
                            <a class=" Login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class=" asqwqw navbar">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="navbar">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <script>
        function showcontents(num) {
            var conta1 = document.getElementById("conta");

            if (num === 1) {
                conta.style.display =
            }
        }
    </script>
    <div class="conta" id="conta">
        @if (session('success'))
        <div class="alert alert-success">
            <button type="button" onclick="showcontents(1)" class="close" data-dismiss="alert"
                aria-hidden="true">x</button>
            {{ session('success') }}
        </div>
        @endif

    </div>

    <div class="conta">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @yield('content')
    </div>

    <footer>
        <div class="footer">
            <div class="footerdes">
                <p><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></p>
                <p>{{ DB::table('webs')->where('id', 1)->value('gmail') }} </p>
                <p>{{ DB::table('webs')->where('id', 1)->value('phone') }}</p>
                <p>Some Where in the World</p>
            </div>
            <div>
                <div class="footerdesc">
                    <div>
                        <a href="{{ route('home') }}" class="url">
                            <p>Home</p>
                        </a>
                        <p><a href="{{ url('/') }}">Benefits</a></p>
                        <p><a href="{{ url('/courses_section') }}">Our Courses </a></p>
                        <p><a href="{{ url('/') }}">Our Testimonials </a></p>
                        <p><a href="{{ url('/') }}">Our FAQ </a></p>
                    </div>
                    <div>
                        <a href="{{ route('about.index') }}">
                            <p>About Us</p>
                        </a>
                        <a href="{{ route('contact.index') }}">
                            <p>Contact us </p>
                        </a>
                        <a href="{{ route('about.index') }}">
                            <p>Achievements</p>
                        </a>
                        <a href="{{ route('about.index') }}">
                            <p>Our Goals</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-start h-l-100">
                <a href="{{ DB::table('webs')->where('id', 1)->value('facebook') }}"> <img class="facebook"
                        src="../../facebook.png" alt=""></a>

                <a href="{{ DB::table('webs')->where('id', 1)->value('linkedin') }}"> <img class="facebook"
                        src="../../linkedin.png" alt=""></a>
            </div>
        </div>
    </footer>
</body>

</html>

<script>
    const items = document.querySelectorAll(".accordion button");

    function toggleAccordion() {
        const itemToggle = this.getAttribute("aria-expanded");

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute("aria-expanded", "false");
        }

        if (itemToggle == "false") {
            this.setAttribute("aria-expanded", "true");
        }
    }
    items.forEach((item) => item.addEventListener("click", toggleAccordion));
</script>
<style lang="">
    @font-face {
        font-family: "Janna LT";
        src: url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.eot");
        src: url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.eot?#iefix") format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.woff2") format("woff2"),
            url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.woff") format("woff"),
            url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.ttf") format("truetype"),
            url("https://db.onlinewebfonts.com/t/dee436f274c410c23fc3de43367ef1ae.svg#Janna LT") format("svg");
    }

    * {
        font-family: Janna LT;
    }

    header {
        background-color: #eeeeee !important;
    }

    .facebook {
        width: 30px;
        border-radius: 10px;
        margin: 10px;
    }

    .asasasas {
        padding: 0 80px;
        background-color: #eeeeee !important;
    }

    /*header*/
    .youtube {
        text-align: center;
        background-color: #00aeef;
        padding: 10px 0px 11px 0px;
        margin: 10px 30px 10px 30px;
        border-radius: 10px;
    }


    .youtube a {
        text-decoration: none;
        background-color: #00aeef;
        color: white;
    }

    .navbar img {
        border-radius: 10px;
    }

    .navbar a,
    .LoginOrRegester a {
        flex-direction: row;
        text-decoration: none;
        color: black;
        padding: 10 15px;
        font-size: 15px;
    }


    .asqwqw a:hover {
        list-style-type: none;
        display: inline-block;
        background-color: rgb(176, 168, 168);
        border-radius: 10px;
        padding: 10 15px;


    }

    .Login {
        background-color: #00aeef;
        border-radius: 10px;
        color: white !important;
    }

    /*footer*/
    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 5fr 5fr 2fr;
        padding-top: 80px;
        font-size: 15px;
    }

    .footerdesc {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    a {
        text-decoration: none;
        color: black;
    }

    @media screen and (max-width: 500px) {
        .footer {
            display: block;
            padding: 0px;
            margin: 20px 0px 0px 40px;
        }

    }
</style>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
