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
    <div class="container mt-5 mb-5">
      <div class="row height d-flex justify-content-center align-items-center">
        <div>
          <div class="card">
            <div class="p-3">
              <h5>Ratting</h5>
            </div>
            <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                <form action="{{route('store.rate' , $id_course)}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" name="comment" class="form-control" placeholder="Enter your comment..."/>
                    <button type="submit">send</button>
                </form>
            </div>
            <div class="mt-2">
            @foreach ( $rating as $ratings )
                <div class="d-flex flex-row p-3">
                    <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3"/>
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                 <span class="mr-2">{{ $ratings->user->name }}</span>
                            </div>
                        </div>
                        <p class="text-justify comment-text mb-0">
                            {{ $ratings->comment }}
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
        </div>
      </div>
</div>
    <div class="courses">
    @foreach ( $video as $videos )
      <div class="advantages">
        <a href="{{ route('generate_url' , $videos->id ) }}">
          <h1>{{ ++$i }}</h1>
          <h4>{{ $videos->name }}</h4>
          <h5>{!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $videos->discription) !!}</h5>
        </a>
      </div>
    @endforeach
    </div>
  </div>
@endsection
