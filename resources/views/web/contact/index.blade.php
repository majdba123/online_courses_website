@extends('web.weblayout')
@section('content')
<div class="contact">
    <div class="contactus"><h1>Contact Us</h1></div>
    <div class="contactdescription">
      <p>
        Welcome to SkillBridge's Pricing Plan page, where we offer two
        comprehensive options to cater to your needs: Free and Pro. We believe
        in providing flexible and affordable pricing options for our services.
        Whether you're an individual looking to enhance your skills or a
        business seeking professional development solutions, we have a plan
        that suits you. Explore our pricing options below and choose the one
        that best fits your requirements.
      </p>
    </div>
  </div>
  <form action={{  route('store.contact')}} method="post">
    @csrf
    @method('POST')
    <div class="contactussubmet">
      <div class="communication">
        <div class="table">
          <div class="cell">
            <div class="row"><p>First Name</p></div>
            <div class="row">
              <input type="text" name="name" placeholder="Enter First Name"  />
            </div>
            <div class="row"><p>Email</p></div>
            <div class="row">
              <input
                type="email"
                name="email"
                id=""
                placeholder="Enter Your Email"
              />
            </div>
          </div>
        </div>
        <div>
          <p>Subject</p>
          <input
            type="text"
            name="subject"
            placeholder="Enter Your Subject"
            id="inputsubject"
          />
          <p>Message</p>
          <textarea
            name="discription"
            placeholder="Enter Your Message Here ..."
            id="inputmessage"
            cols="30"
            rows="10"
          ></textarea>
        </div>
        <button type="submit">submit</button>
    </form>
      </div>
      <div class="add">
        <div class="email">
          <logo>LOGO</logo>
          <p>support@skillbridge.com</p>
        </div>
        <div class="phone">
          <logo>LOGO</logo>
          <p>+91 00000 00000</p>
        </div>
        <div class="GPS">
          <logo>LOGO</logo>
          <p>Some Where in the World</p>
        </div>
        <div class="socialmedia">
          <logo>LOGO</logo>
          <p>Social Profiles</p>
        </div>
      </div>
    </div>
  </form>
@endsection
