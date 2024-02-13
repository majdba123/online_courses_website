@extends('web.weblayout')
@section('content')


<div class="background">
    <div class="advantages">
    <form action="{{ route('order.store' , $courses->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <h1>Order place</h1>
      <h3>
        Name Course:
        <h4>{{ $courses->name }}</h4>
      </h3>
      <h2></h2>
      <h3>
        Price:
        <h4>{{ $courses->price }}</h4>
      </h3>
      <h2></h2>
      <h3>
        Doctor:
        <h4>{{ $courses->doctor->name }}</h4>
      </h3>
      <h2></h2>
      <h3>
        Number_Of_Video:
        <h4>2</h4>
      </h3>
      <h2></h2>
      <h3>
        Discrption:
        <h4>
            {{ $courses->discription }}
        </h4>
      </h3>
      <h2></h2>
      <h3>
        Discount:
        <h4>{{ $courses->discount->discount_percentage }}</h4>
      </h3>
      <h2></h2>
      <h3>send a copy of the transfer via Al-Haram Company:</h3>
      <input type="file" class="form-control" id="exampleFormControlInput1"  name="imge">
      <button type="submit" class="btn btn-primary">Place Order</button
      </form>
    </div>
  </div>
@endsection


<style>
    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 50px 500px 40px 500px;
      }
    image-preview {
        max-width: 300px;
      }
    .advantages {
        text-align: left;
        padding-top: 10px;
        margin: 30px;
        background-color: white;
        border-radius: 5px;
        padding: 20px;
      }
    .advantages h4 {
        display: inline;
      }
    h3,
    h4 {
        display: inline;
      }
    .asas {
        margin: 30px;
        margin-left: 80px;
        padding: 7px;
        font-size: 16px;
        width: 200px;
        border-radius: 40px;
        background-color: #00aeef;
        color: white;
      }
</style>
