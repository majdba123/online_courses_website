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
              <input type="text"   name="name" placeholder="Enter First Name"  />
            </div>
            <br>
            <div class="row"><p>Email</p></div>
            <div class="row">
              <input
                type="email"
                name="email"
                id=""
                placeholder="Enter Your Email"
              />
            </div>
            <br>
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
        <div class="submet">
            <button type="submit">submit</button>
        </div>
    </form>
      </div>
      <div class="add">
        <div class="email">
          <logo><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></logo>
          <p>{{ DB::table('webs')->where('id', 1)->value('gmail') }}</p>
        </div>
        <div class="phone">
          <logo><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></logo>
          <p>{{ DB::table('webs')->where('id', 1)->value('phone') }}</p>
        </div>
        <div class="socialmedia">
          <logo><img src="{{ asset('logo.jpg') }}" alt="" width="40px" /></logo>
          <div>
            <a href="{{ DB::table('webs')->where('id', 1)->value('facebook') }}"> facebook</a>
            <br>
            <br>
            <a href="{{ DB::table('webs')->where('id', 1)->value('linkedin') }}"> linkedin</a>
        </div>
        </div>
      </div>
    </div>
  </form>
@endsection
<style>
    .contact {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-top: 40px;
      }
      .contactus {
        padding-left: 40px;
        padding-top: 40px;
      }
      .contactdescription p {
        font-size: 16px;
        padding-top: 40px;
      }
      .contactussubmet {
        background-color: #eeeeee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 160px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        padding-top: 80px;
      }
      .communication {
        margin-bottom: 150px;
      }
      .table {
        display: table;
      }
      .row {
        display: table-row;
      }
      .cell {
        display: table-cell;
      }
      input[type="text"],
      input[type="email"] {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 360px;
        border-radius: 5px;
        text-align: left;
      }
      #inputsubject {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 720px;
        border-radius: 5px;
        text-align: left;
      }
      input::placeholder {
        text-align: top;
      }
      #inputmessage {
        padding: 7px;
        font-size: 16px;
        border: none;
        width: 720px;
        border-radius: 5px;
        text-align: left;
        height: 160px;
      }
      .row p {
        padding-bottom: 15px;
        padding-top: 15px;
      }
      .add {
        text-align: center;
      }
      .email,
      .phone,
      .socialmedia,
      .GPS {
        padding-top: 60px;
        padding-bottom: 20px;
        margin: 40px;
      }
      .submet {
        text-align: center;
        padding-right: 100px;
        padding-top: 40PX;

      }

      .submet a {
        background-color: #00aeef;
        border-radius: 10px;
        color: white ;
        text-decoration: none;
        padding: 10px;
      }
</style>
