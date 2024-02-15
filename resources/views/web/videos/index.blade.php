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
<<<<<<< Updated upstream

=======
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
                    @php
                        $x=$ratings->user->image
                    @endphp
                    <img src="{{ asset('imageprfile/'. $x) }}" width="40" height="40" class="rounded-circle mr-3"/>
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
>>>>>>> Stashed changes
</div>
<div class="courses">
    @foreach ( $video as $videos )
    <div class="advantages">
        <h1>{{ ++$i }}</h1>
        <a href="{{ route('generate_url' , $videos->id ) }}">
            <h4>{{ $videos->name }}</h4>
        </a>
        <h5>{!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $videos->discription) !!}
        </h5>

    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {!! $video->links() !!}
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
                        <input type="text" class="comments"name="comment" class="form-control" placeholder="Enter your comment..." />
                        <button type="submit">send</button>
                    </form>
                </div>
                <div class="mt-2">
                    @foreach ( $rating as $ratings )
                    <div class="d-flex flex-row p-3">
                        <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3" />
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="namepersone">{{ $ratings->user->name }}</span>
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
@endsection


<style>
    .container {
        margin-top: 5rem;
        margin-bottom: 5rem;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 1rem;
    }

    .form-color {
        background-color: #f9f9f9;
    }

    .form-control {
        width: 70%;
        padding: 0.5rem;
        margin-right: 1rem;
    }

    button {

        border-radius: 10px !important;
        border: none;
        padding: 9px 80px !important;
        background-color: #00aeef;
        font-size:14px !important;
        margin-left:20px !important;
    }

    .comment-text {
        text-align: justify;
    }

    .card {
        background-color: white;
    }
    .namepersone{
        font-size:20px;
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
        word-wrap: break-word;
        word-break: break-all;
        line-height: 1.2em;
    }

    .courses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(355px, 1fr));
        grid-gap: 20px;
    }
    .comments{
        border:none;
        padding: 7px;
        font-size: 16px;
        width:1000px;
        border-radius: 5px;
        text-align: left;
    }
</style>
