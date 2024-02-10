<h1>Order Place</h1>

<form action="{{ route('order.store' , $courses->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p> name : {{ $courses->name }} </p>
    <p> price : {{ $courses->price }} </p>
    <p> doctor : {{ $courses->doctor->name }} </p>
    <p> number_of_video :  </p>
    <p> disciption : {{ $courses->discription }} </p>
    <p> discount : {{ $courses->discount->discount_percentage }} </p>
    <br>
    <label for="phone">Send a copy of the transfer via Al-Haram Company:</label>
    <br>
    <input type="file" class="form-control" id="exampleFormControlInput1"  name="imge">
    <br>
    <button type="submit">Place Order</button>

</form>
