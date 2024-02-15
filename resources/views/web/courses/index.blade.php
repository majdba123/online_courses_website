@extends('web.weblayout')
@section('content')
<div class="background">
    <div class="contact">
        <div class="contactus">
            <h1>Online Medical Courses</h1>
        </div>
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
            <div class="truew">
                <form method="post" action="{{ route('store.fff' , $coursess->id )}}">
                    @csrf
                    @method('POST')
                  <button type="submit" class="Favorite">Add To Favorite</button>
                </form>
                <a href="{{ route('video', $coursess->id ) }}" class="url">
                    <h1>{{$coursess->name }}</h1>
                </a>
            </div>
            <h1>   {{$coursess->time_of_course }} : الوقت </h1>
            <br>
            <h1>Discrption</h1>
            <h4>
                {{ $coursess -> discription }}
            </h4>
            <h3>{{ $coursess->doctor->name }} : الدكتور</h3>
            <br>
            <h3>: المحتويات</h3>
            <div class="card-container">
                @foreach ( $coursess->video as $videoas )
                <div class="card">
                    <h1 class="number">{{ $loop->iteration }}</h1>
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
    <div class="d-flex justify-content-center">
        {!! $courses->links() !!}
    </div>
</div>
@endsection
<style>
    .Favorite {
        font-size: 12px;
        border: none;
        border-radius: 5px;
        background-color: #00aeef;
        color: white;
    }

    .truew {
        display: flex;
        justify-content: space-between;
    }

    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0px 150px 40px 150px;
    }

    .contactdescription p {
        font-size: 14px
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
        background-color:white !important;
    }

    .card {
        background-color: white !important;
        padding-right: 10px;
        text-align: right;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .number {
        background-color: white;
    }
</style>
