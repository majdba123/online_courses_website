@extends('web.weblayout')
@section('content')

<div class="background">
<div class="wehelp">
  <h1 class="hh">
    <span class="we">We</span> Help You Find Your Medical Passion
  </h1>
  <h2>أفضل الدورات الطبية أينما كنت</h2>
  <h6>تعلم من أفضل الأطباء و طور مهاراتك</h6>
  <a class="browser" href="{{ route('courses') }}">تصفح الدورات</a>
</div>
<div class="video">
  <iframe
    width="560"
    height="315"
    src="https://www.youtube.com/embed/B_HR2R3xsnQ?si=HpTAtNKAw8aLS_2K"
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
<div class="advantages">
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
        <img src="./logo.jpg" alt="" width="40px" /> <span>{{ $rates->user->name  }}</span>
      </div>
      <div class="comment">name: {{ $rates->user->name  }} </div>
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
