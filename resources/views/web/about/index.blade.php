@extends('web.weblayout')
@section('content')
<div class="contact">
    <div class="contactus">
        <h1>About EZM</h1>
    </div>
    <div class="contactus">
        <p>
            Welcome to our platform, where we are passionate about empowering
            individuals to master the world of design and development. We offer a
            wide range of online courses designed to equip learners with the
            skills and knowledge needed to succeed in the ever-evolving digital
            landscape.
        </p>
    </div>
</div>
<div class="Achievements">
    <div class="contactus">
        <h1>Achievements</h1>
        <p>
            Our commitment to excellence has led us to achieve significant
            milestones along our journey. Here are some of our notable
            achievements
        </p>
    </div>
</div>
<div class="contact">
    @foreach ($achievement as $achievements)
    <div class="contactdescription">
        <logo><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></logo>
        <h3>{{ $achievements->title }}</h3>
        <p>
            {{ $achievements->achievement }}
        </p>
    </div>
    @endforeach

</div>

<div class="Achievements">
    <div class="contactus">
        <h1>Our Goals</h1>
        <p>
            At SkillBridge, our goal is to empower individuals from all
            backgrounds to thrive in the world of design and development. We
            believe that education should be accessible and transformative,
            enabling learners to pursue their passions and make a meaningful
            impact. Through our carefully crafted courses, we aim to
        </p>
    </div>
</div>
<div class="contact">
    @foreach ($goal as $goals)
    <div class="contactdescription">
        <logo><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></logo>
        <h3>{{ $goals->title }}</h3>
        <p>
            {{ $goals->golas }}
        </p>
    </div>
    @endforeach
</div>

<div class="Together">
    <div class="contactus">
        <h1>
            <span>Together</span>, let s shape the future of digital innovation
        </h1>
        <p>
            Join us on this exciting learning journey and unlock your potential in
            design and development.
        </p>
    </div>
    <div class="contactus">
        <a href="{{ route('register') }}">Join Now</a>
    </div>


</div>
@endsection
<style>
    .contact {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0 130px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-top: 40px;
        gap: 35px;

    }

    .contactus {
        font-size: 15px;

    }

    .contactdescription p {
        font-size: 12px;
    }

    .contactdescription {
        background-color: white;
        padding-left: 40px;
        gap: 20px;
        font-size: 16px;
        padding-top: 40px;
        width: 37vw;
        height: 17vw;
    }

    .Achievements {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 130px;
        padding-top: 40px;
        padding-bottom: 40px;

    }

    .Together {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0 130px;
        display: grid;
        grid-template-columns: 1.9fr 1fr;
        padding-top: 40px;
    }

    h1 span {
        color: #00aeef;
    }

    .contactus a {
        text-decoration: none;
        background-color: #00aeef;
        color: white;
        border-radius: 5px;
        font-size: 15px;
        padding: 10px;
        margin-left: 100px;
    }
</style>
