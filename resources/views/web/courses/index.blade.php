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

    <div class="courses">
        @foreach ($courses as $coursess )
        <div class="advantages">
            <a href="{{ route('video', $coursess->id ) }}" class="url" >
                <h1>{{$coursess->name  }}</h1>
            </a>
                <h4>
                    {{ $coursess -> discription }}
                </h4>
                <h3>{{ $coursess->doctor->name }} : الدكتور</h3>
                <h3>: المحتويات</h3>
                <div class="card-container">
                    @foreach ( $coursess->video as $videoas )
                            <div class="card">
                            <h1 class="number">{{ ++$i }}</h1>
                            <a href="{{ route('generate_url' , $videoas->id ) }}" class="url">
                                <h3 class="number">{{ $videoas->name }}</h3>
                            </a>
                            </div>

                    @endforeach
                    @php
                        $i=0;
                    @endphp
                </div>
        </div>
        @endforeach

    </div>
  </div>
@endsection
<style>

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
</style>
