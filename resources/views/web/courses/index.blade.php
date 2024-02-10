@extends('web.weblayout')
@section('content')
<div class="background">
    <div class="contact">
      <div class="contactus"><h1>Online Medical Courses</h1></div>
      <div class="contactdescription">
        <p>
          Welcome to our platform, where we are passionate about empowering
          individuals to master the world of design and development. We offer
          a wide range of online courses designed to equip learners with the
          skills and knowledge needed to succeed in the ever-evolving digital
          landscape.
        </p>
      </div>
    </div>
    <a>
    <div class="courses">
        @foreach ($courses as $coursess )
        <a href="{{ route('video', $coursess->id ) }}" >
            <div class="advantages">
            <h1>{{$coursess->name  }}</h1>
            <h4>
                {{ $coursess -> discription }}
            </h4>
            <h3>{{ $coursess->doctor->name }} : الدكتور</h3>
            <h3>: المحتويات</h3>
            <div class="card-container">
                @foreach ( $coursess->video as $videoas )
                    <a href="{{ route('generate_url' , $videoas->id ) }}">
                        <div class="card">
                            <h1 class="number">{{ ++$i }}</h1>
                            <h3 class="number">{{ $videoas->name }}</h3>
                            <h4 class="number">{!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $videoas->discription) !!}</h4>
                        </div>
                    </a>
                @endforeach
                @php
                    $i=0;
                @endphp
            </div>
            </div>
        </a>
        @endforeach
    </div>
  </div>
@endsection
