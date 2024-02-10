@extends('web.weblayout')
@section('content')
    <div class="contact">
        <div class="contactus">
            <h1>About EZM</h1>
        </div>
        <div class="contactdescription">
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
            <div  class="contactus">
                <logo>LOGO</logo>
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
                <div class="contactus">
                    <logo>LOGO</logo>
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
            <div class="contactdescription">
              <a href="{{ route('register') }}">Join Now</a>
            </div>

        </div>
    @endsection
