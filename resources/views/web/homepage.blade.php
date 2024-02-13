@extends('web.weblayout')
@section('content')

<div class="background">
<div class="wehelp">
  <h1 class="hh">
    <span class="we">We</span> Help You Find Your Medical Passion
  </h1>
  <h2>أفضل الدورات الطبية أينما كنت</h2>
  <br>
  <h6>تعلم من أفضل الأطباء و طور مهاراتك</h6>
  <br>
  <a class="browser" href="{{ route('courses') }}">تصفح الدورات</a>
</div>
<div class="video">
  <iframe
    width="560"
    height="315"
    src="{{ DB::table('webs')->where('id', 1)->value('introduction') }}"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
  ></iframe>
</div>
<div class="advantages">
  <h1>ما هي ميزات ؟ EZ Medicine</h1>
  <h6>:EZ Medicine اكتشف مزايا التعلم مع</h6>
</div>
<div class="card-container">
  <!-- Card 1 -->
  @foreach ($benefit as $benefits )
    <div class="card">
        <h1 class="number">{{ ++$i }}</h1>
        <h3 class="number">{{$benefits->title}}</h3>
        <p class="number">
            {{$benefits->benefits}}
        </p>
    </div>
  @endforeach
</div>
<div class="advantages">
  <h1>الدورات</h1>
  <h6>:اتطلع على مكتبتنا الواسعة من الدورات الطبية المميزة</h6>
</div>
<div class="card-containe">
  @foreach ( $course as $courses )
    <div class="card">
        <h1 class="number"> {{ $courses->name  }}</h1>
        <h2 class="number"> Doctor : {{ $courses->doctor->name  }}</h2>
        <h3 class="number">{{ $courses->price  }}</h3>
        <p class="number">
            {{ $courses->discription  }}
        </p>
        <div class="getit"><a href="{{ route('video' , $courses->id ) }}">Get it Now</a></div>
    </div>
  @endforeach
</div>
<div class="advantagess">
  <h1>آراء الأطباء و الطلاب</h1>
  <h6>
    : اتطلع على آراء أطبائنا و طلابنا بمنصة EZ Medicine وما قدمت لهم
  </h6>
</div>


<div class="card-containe">
@foreach ( $rate as $rates )
  <div class="card">
    <p class="number">
        {{ $rates->comment }}
    </p>
    <div class="contai">
      <div class="comment">
        <img src="{{ asset('logo.jpg') }}" alt="" width="40px" />
      </div>
      <div class="comment">{{ $rates->user->name  }} </div>
    </div>
  </div>
@endforeach
</div>
<div class="question">
    <div class="allquestion">
        <div class="container">
            <div class="accordion">
                @foreach($qfa as $qfas)
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="false">
                            <span class="accordion-title"
                            >{{ $qfas->quastion }}</span
                            ><span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                {{ $qfas->answee }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="all">
        <h1>الأسئلة الشائعة</h1>
        <h5>هل لديك المزيد من الأسئلة؟ <a href="{{ route('contact.index') }}"> تواصل معنا</a></h5>
      </div>
</div>

</div>

@endsection
<style>
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

      .accordion button[aria-expanded="true"] + .accordion-content {
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

</style>
