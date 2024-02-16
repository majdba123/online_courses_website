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
            <h3>
                Price:
                <h4>{{ $courses->price }}</h4>
            </h3>
            <h3>
                Doctor:
                <h4>{{ $courses->doctor->name }}</h4>
            </h3>

            <h3>
                Discrption:
                <h4>
                    {{ $courses->discription }}
                </h4>
            </h3>
            <h2></h2>
            @if ($courses->discount->discount_percentage != 0)
            <h4>Price after discount: {{ $courses->price - ($courses->price * $courses->discount->discount_percentage /
                100) }} </h4>
            @else
            <h4> No discount available </h4>
            @endif

            <h2></h2>
            <h3>send a copy of the transfer via Al-Haram Company:</h3>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="imge">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</div>
@endsection


<style>
    .background {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 0px 500px 40px 500px;
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

    @media screen and (max-width: 500px) {
        h1 {
            font-size: 20px;
        }

        .background {
            padding: 0px;
        }

        .contact {
            display: block;
            padding: 20px;
        }


    }
</style>
