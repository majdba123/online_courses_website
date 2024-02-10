<html>

<head>
    <link href="https://db.onlinewebfonts.com/c/dee436f274c410c23fc3de43367ef1ae?family=Janna+LT" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/dee436f274c410c23fc3de43367ef1ae?family=Janna+LT" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EZM</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <header>
        <div class="youtube"><a href="{{ DB::table('webs')->where('id', 1)->value('youtube') }}">الق نظرة على قناة
                اليوتيوب</a></div>
        <div class="Header">
            <div class="HeaderPage">
                <h3>
                    <ul>
                        <li class="navbar">Logo</li>
                        <li class="navbar"><a href="{{ route('home') }}"> الرئيسية</a></li>
                        <li class="navbar"><a href="{{ route('courses') }}">الدورات</a></li>
                        <li class="navbar"><a href="{{ route('about.index') }}">عن المنصة</a></li>
                        <li class="navbar"><a href="{{ route('profile.index') }}">الصفحة الشخصية </a></li>
                        <li class="navbar"><a href="{{ route('contact.index') }}">تواصل معنا</a></li>
                    </ul>
                </h3>
            </div>
            <ul>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="navbar">
                            <a class="Login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="navbar">
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
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </header>
    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('success') }}
            </div>

        </div>
    @endif
    @yield('content')

    <footer>
        <div class="footer">
            <div class="footerdes">
                <p>LOGO</p>
                <a href="{{ DB::table('webs')->where('id', 1)->value('gmail') }}"> gmail</a>
                <p>{{ DB::table('webs')->where('id', 1)->value('phone') }}</p>
                <p>Some Where in the World</p>
            </div>
            <div>
                <div class="footerdesc">
                    <div>
                        <a href="{{ route('home') }}">
                            <p>Home</p>
                        </a>
                        <p>Benefits</p>
                        <p>Our Courses</p>
                        <p>Our Testimonials</p>
                        <p>Our FAQ</p>
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
                    <div>
                        <a href="{{ DB::table('webs')->where('id', 1)->value('facebook') }}"> facebook</a>
                        <a href="{{ DB::table('webs')->where('id', 1)->value('linkedin') }}"> linkedin</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
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
        background-color: #eeeeee;
        font-family: Janna LT;
    }

    /*__________________Header_____________________*/
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

    .Header {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
    }

    .Header .LoginOrRegester,
    .Header .LoginOrRegester1 {
        list-style-type: none;
        text-align: right;
        display: inline-block;
        padding: 10px 15px;
    }

    .Header .navbar a,
    .Header .LoginOrRegester a {
        flex-direction: row;
        text-decoration: none;
        color: black;
        padding: 10 15px;
    }

    .Header .navbar {
        list-style-type: none;
        text-align: left;
        display: inline-block;
    }

    .Header .navbar a:hover {
        list-style-type: none;
        display: inline-block;
        background-color: rgb(176, 168, 168);
        border-radius: 15px;
    }

    .Login {
        background-color: #00aeef;
        border-radius: 10px;
        color: white !important;
    }

    /*_______________________body_________________________*/
    .bodypage {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 150px 200px 10px 200px;
    }

    .bodypage h1 {
        text-align: center;
        margin: auto;
    }

    .bodypage h4 {
        text-align: center;
        margin: auto;
        font-weight: 300;
        padding-bottom: 20px;
    }

    .tableoflogin .nameoflogin {
        text-align: right;
        padding-right: 7px;
    }

    .remember {
        text-align: right !important;
        padding-right: 7px;
    }

    input[type="email"],
    input[type="text"],
    input[type="password"] {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 360px;
        border-radius: 5px;
        text-align: right;
    }
    body {
        background-color: #eeeeee;
      }
      span {
        color: red;
      }
      .background {
        text-align: center;
        align-items: center;
        padding: 50px 200px 10px 200px;
      }
      video {
        border-radius: 30px;
        width: 100%;
        height: 100%;
        padding-bottom: 20px;
        padding: 20px;
        background-color: #00aeef;
      }
    input[type="button"] {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 360px;
        border-radius: 5px;
        background-color: #00aeef;
        color: white;
    }

    .password a {
        text-decoration: none;
        color: black;
    }

    .Or {
        text-align: center;
    }

    .descreption {
        margin-right: 150px;
        padding-bottom: 70px;
    }

    .descreption p {
        font-size: 15px;
    }

    .comment {
        padding-top: 50px;
        padding-left: 50px;
    }

    /*______________________fotter_______________________*/
    .footer {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-top: 80px;
    }

    .footerdesc {
        display: grid;

        grid-template-columns: 1fr 1fr 1fr;
    }

    /*___________________________*/
    .contact {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-top: 40px;
    }

    .contactus {
        padding-left: 40px;
        padding-top: 40px;
    }

    .contactdescription {
        font-size: 16px;
        padding-top: 40px;
    }

    .Achievements {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .Together {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 1.9fr 1fr;
        padding-top: 40px;
    }

    h1 span {
        color: #00aeef;
    }

    .contactdescription a {
        text-decoration: none;
        background-color: #00aeef;
        color: white;
        border-radius: 5px;
        font-size: 15px;
        padding: 10px;
        margin-left: 100px;
    }
</style>
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

    /*__________________Header_____________________*/
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

    header {
        background-color: #eeeeee;
    }

    .Header {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
    }

    .Header .LoginOrRegester,
    .Header .LoginOrRegester1 {
        list-style-type: none;
        text-align: right;
        display: inline-block;
        padding: 10px 15px;
    }

    .Header .navbar a,
    .Header .LoginOrRegester a {
        flex-direction: row;
        text-decoration: none;
        color: black;
        padding: 10 15px;
    }

    .Header .navbar {
        list-style-type: none;
        text-align: left;
        display: inline-block;
    }

    .Header .navbar a:hover {
        list-style-type: none;
        display: inline-block;
        background-color: rgb(176, 168, 168);
        border-radius: 15px;
    }

    .Login {
        background-color: #00aeef;
        border-radius: 10px;
        color: white !important;
    }

    /*_______________________body_________________________*/

    .background {
        background-color: #eeeeee;


        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 10px 200px;
    }

    .hh {
        background-color: white;
        border-radius: 10px;
    }

    .wehelp {
        text-align: center;
        padding-bottom: 100px;
    }

    .we {
        color: #00aeef;
    }

    .browser {
        text-decoration: none;
        background-color: #00aeef;
        border-radius: 10px;
        color: white;
        padding: 10px 15px;
    }

    iframe {
        width: 100%;
        height: 100%;
        padding-bottom: 20px;
    }

    .advantages {
        text-align: end;
        padding-top: 30px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 20px;
    }

    .card {
        background-color: white;
        padding: 20px;
        text-align: right;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-containe {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(355px, 1fr));
        grid-gap: 20px;
        padding-bottom: 50px;
    }

    .number {
        background-color: white;
    }

    .getit a {
        background-color: #eeeeee;
        text-decoration: none;
        color: black;
    }

    .getit {
        text-align: center;
        padding: 4px;
        border-radius: 5px;
        background-color: #eeeeee;
    }

    .contai {
        width: 100%;
        display: flex;
        justify-content: space-between;
        background: none;
    }

    .comment a {
        text-decoration: none;
        color: black;
        padding: 6px;
        border-radius: 5px;
        background-color: #eeeeee;
    }

    span {
        background: none;
    }

    .comment {
        background: none;
        display: flex;
        align-items: center;
    }

    .question {
        display: grid;
        grid-template-columns: 2fr 1fr;


        justify-content: space-between;
        align-items: center;
        background-color: white;
        border-radius: 10px;
    }

    h5 a {
        text-decoration: none;
        color: #00aeef;
        text-align: center;
    }

    input[type="button"] {
        padding: 7px;
        font-size: 16px;
        width: 225px;
        border: 2px solid #00aeef;
        border-radius: 5px;
        background-color: white;
        color: black;
    }

    :root {
        --bg: #fff;
        --text: #7288a2;
        --gray: #4d5974;
        --lightgray: #e5e5e5;
        --blue: #03b5d2;
    }

    * {
        box-sizing: border-box;
    }

    .container {
        margin: 0 auto;
        padding: 4rem;
        width: 48rem;
    }

    .accordion .accordion-item {
        border-bottom: 1px solid var(--lightgray);
    }

    .accordion button[aria-expanded="true"] {
        border-bottom: 1px solid var(--blue);
    }

    .accordion button {
        position: relative;
        display: block;
        text-align: left;
        width: 100%;
        padding: 1em 0;
        color: var(--text);
        font-size: 1.15rem;
        font-weight: 400;
        border: none;
        background: none;
        outline: none;
    }

    .accordion button:hover,
    .accordion button:focus {
        cursor: pointer;
        color: var(--blue);
    }

    .accordion button::after {
        content: "";
    }

    .accordion .accordion-title {
        padding: 1em 1.5em 1em 0;
    }

    .accordion .icon {
        display: inline-block;
        position: absolute;
        top: 18px;
        right: 0;
    }

    .accordion .icon::before {
        content: "";
    }

    .accordion .icon::after {
        content: "";
    }

    .accordion button[aria-expanded="true"] {
        color: var(--blue);
    }

    .accordion button[aria-expanded="true"]+.accordion-content {
        opacity: 1;
        max-height: 9em;
    }

    .accordion .accordion-content {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
    }

    .accordion .accordion-content p {
        font-size: 1rem;
        font-weight: 300;
        margin: 2em 0;
    }

    /*______________________fotter_______________________*/
    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-top: 80px;
    }

    .footerdesc {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .card {
        background-color: white;
    }

    .form-color {
        background-color: #fafafa;
    }

    .form-control {
        height: 48px;
        border-radius: 25px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #35b69f;
        outline: 0;
        box-shadow: none;
        text-indent: 10px;
    }

    .c-badge {
        background-color: #35b69f;
        color: white;
        height: 20px;
        font-size: 11px;
        width: 92px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2px;
    }

    .comment-text {
        font-size: 13px;
    }

    .wish {
        color: #35b69f;
    }

    .user-feed {
        font-size: 14px;
        margin-top: 12px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 40px 200px;
    }

    .contact {
        background-color: #eeeeee;
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .contactus {
        padding-left: 40px;
        padding-top: 40px;
    }

    .contactdescription {
        font-size: 16px;
        padding-top: 40px;
    }

    .advantages {
        text-align: end;
        padding-top: 10px;
        margin: 30px;
        background-color: white;
        border-radius: 5px;
        padding: 20px;
    }

    .advantages h4,
    .advantages h5 {
        text-align: left !important;
    }

    .courses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(355px, 1fr));
        grid-gap: 20px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 40px 200px;
    }

    .contact {
        background-color: #eeeeee;
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .contactus {
        padding-left: 40px;
        padding-top: 40px;
    }

    .contactdescription {
        font-size: 16px;
        padding-top: 40px;
    }

    .advantages {
        text-align: end;
        padding-top: 10px;
        margin: 30px;
        background-color: white;
        border-radius: 5px;
        padding: 20px;
    }

    .advantages h4 {
        text-align: left !important;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(184px, 1fr));
        grid-gap: 20px;
    }

    .card {
        background-color: white;
        padding-right: 10px;
        text-align: right;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .number {
        background-color: white;
    }

    .card {
        background-color: white;
    }

    .form-color {
        background-color: #fafafa;
    }

    .form-control {
        height: 48px;
        border-radius: 25px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #35b69f;
        outline: 0;
        box-shadow: none;
        text-indent: 10px;
    }

    .c-badge {
        background-color: #35b69f;
        color: white;
        height: 20px;
        font-size: 11px;
        width: 92px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2px;
    }

    .comment-text {
        font-size: 13px;
    }

    .wish {
        color: #35b69f;
    }

    .user-feed {
        font-size: 14px;
        margin-top: 12px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 40px 200px;
    }

    .contact {
        background-color: #eeeeee;
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .contactus {
        padding-left: 40px;
        padding-top: 40px;
    }

    .contactdescription {
        font-size: 16px;
        padding-top: 40px;
    }

    .advantages {
        text-align: end;
        padding-top: 10px;
        margin: 30px;
        background-color: white;
        border-radius: 5px;
        padding: 20px;
    }

    .advantages h4,
    .advantages h5 {
        text-align: left !important;
    }

    .courses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(355px, 1fr));
        grid-gap: 20px;
    }
</style>
