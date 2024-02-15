@extends('web.weblayout')
@section('content')
<div class="backgroundq">
    <div class="containerq">
        <div class="headerr">
            <button id="button1" onclick="showcontentss(3)">المفضلة</button>
            <button id="button2" onclick="showcontentss(2)">الدورات</button>
            <button id="button3" onclick="showcontentss(1)">حسابك الشخصي</button>
        </div>
    </div>
    <div class="containeq">
        <div class="contacts" id="contacts1">
            <div class="profile">
                <h2 class="profile">المعلومات الشخصية</h2>
            </div>
            <form action="{{ route('profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="contactussubmetq">
                    <div class="hyhy">
                        <div class="tablex">
                            <div class="imagew"><img id="image-preview" class="imgprofile" src="../../profile.jpg"
                                    alt="../../profile.jpg">
                            </div>

                        </div>

                        <div class="tablex">
                            <div class="cell">
                                <div class="row">
                                    <p class="azaz">الكنية</p>
                                </div>
                                <div class="row">
                                    <div class=qwerqwer> <input type="text" value="{{ $user->address }}" name="address"
                                            class="qaws" placeholder="Enter Your Address" /></div>
                                </div>
                                <div class="row">
                                    <p class="azaz">البريد الالكتروني</p>
                                </div>
                                <div class="row">
                                    <div class=qwerqwer> <input type="email" value="{{ $user->email }}" name="email"
                                            id="" class="qaws" placeholder="أدخل بريدك الالكتروني" /></div>
                                </div>
                            </div>
                            <div class="cell">
                                <div class="row">
                                    <p class="azaz">الأسم الأول</p>
                                </div>
                                <div class="row">
                                    <div class=qwerqwer> <input type="text" value="{{ $user->name }}" name="name"
                                            placeholder="أدخل الأسم " class="qaws" /></div>
                                </div>
                                <div class="row">
                                    <p class="azaz">رقم الجوال</p>
                                </div>
                                <div class="row">

                                    <div class=qwerqwer> <input type="text" value="{{ $user->phone }}" name="phone"
                                            placeholder="أدخل رقم الجوال" class="qaws" /></div>
                                </div>
                      
                                <div class="row">



                                    <input type="file" id="file-input">

                                    <script>
                                        document.getElementById('file-input').onchange = function (e) {
                                            var reader = new FileReader();
                                            reader.onload = function () {
                                                var preview = document.getElementById('image-preview');
                                                preview.src = reader.result;
                                            }
                                            reader.readAsDataURL(e.target.files[0]);
                                        }
                                    </script>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="submet">
                    <button class="asas">حفظ التعديلات</button>
                </div>
        </div>
        </form>
    </div>
    <div class="contacts" id="contacts2">
        <div class="courses">
            @foreach ($courses as $coursess )
            <div class="advantages">
                <a href="{{ route('video', $coursess->id ) }}" class="url">
                    <h1>{{$coursess->name }}</h1>
                </a>
                <h4>
                    {{ $coursess -> discription }}
                </h4>
                <h3>{{ $coursess->doctor->name }} : الدكتور</h3>
                <h3>: المحتويات</h3>
                <div class="card-container">
                    @foreach ( $coursess->video as $videoas )
                    <div class="card">
                        <h1 class="number">{{ ++$i }}</h1>
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
    </div>

    <div class="contacts" id="contacts3">
        <div class="courses">
            @foreach ($couu as $coursesss )
            <div class="advantages">
                <a href="{{ route('video', $coursesss->id ) }}" class="url">
                    <h1>{{$coursesss->name }}</h1>
                </a>
                <h4>
                    {{ $coursesss -> discription }}
                </h4>
                <h3>{{ $coursesss->doctor->name }} : الدكتور</h3>
                <h3>: المحتويات</h3>
                <div class="card-container">
                    @foreach ( $coursesss->video as $videoas )
                    <div class="card">
                        <h1 class="number">{{ ++$i }}</h1>
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
    </div>





    <div class="containeq">
        <div class="profile">
            <h2 class="profile">تغيير كلمة المرور</h2>
        </div>
        <form action="{{ route('profile.update1', $user->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="contactussubmetq">
                <div class="table">
                    <div class="cell">
                        <div class="row">
                            <p class="azaz">كلمة المرور الجديدة</p>
                        </div>
                        <div class="row">
                            <div class=qwerqwer> <input type="password" name="new_password" class="qaws" /></div>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="row">
                            <p class="azaz">كلمة المرور الحالية</p>
                        </div>
                        <div class="row">
                            <div class=qwerqwer> <input type="password" name="current_password" class="qaws" />
                            </div>
                        </div>
                        <div class="row">
                            <p class="azaz">نأكيد كلمة المرور</p>
                            <div class=qwerqwer> <input type="password" name="new_password_confirmation" class="qaws" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submet">
                    <button class="asas">حفظ التعديلات</button>
                </div>
            </div>

        </form>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order </th>
                                    <th> username </th>
                                    <th>course name</th>
                                    <th>price</th>
                                    <th>image</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($order as $orders )
                                <tr class="cell-1">
                                    <td class="text-center">{{ $orders->id }}</td>
                                    <td>{{$orders->user->name }}</td>
                                    <td><a href="{{ route('video' , $orders->courses) }}">{{ $orders->courses->name
                                            }}</a></td>
                                    <td>
                                        <span class="badge badge-success">{{ $orders->price }}</span>
                                    </td>
                                    <td><a href={{ asset('Order_file/'.$orders->image) }}>
                                            <img src="{{ asset('Order_file/'.$orders->image) }}" width="100"
                                                height="100" alt="not found" /></a></td>
                                    <td>{{ ($orders->status == 0) ? 'pending' : 'complete' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


<script>
    function showcontentss(num) {
        var contents1 = document.getElementById("contacts1");
        var contents2 = document.getElementById("contacts2");
        var contents3 = document.getElementById("contacts3");

        if (num === 1) {
            contacts1.style.display = "block";
            contacts2.style.display = "none";
            contacts3.style.display = "none";
        } else if (num === 2) {
            contacts1.style.display = "none";
            contacts2.style.display = "block";
            contacts3.style.display = "none";
        } else if (num === 3) {
            contacts1.style.display = "none";
            contacts2.style.display = "none";
            contacts3.style.display = "block";
        }
    }
</script>
<style lang="">
    /*_______________________body_________________________*/
    .azaz {
        background-color: white !important;
    }




    .qwerqwer {
        text-align: right !important;
        align-items: right !important;
        background-color: white !important;
    }



    .backgroundq {
        background-color: #eeeeee;
        justify-content: space-between;
        align-items: center;
        padding: 50px 200px 10px 200px;
    }

    .containerq {
        margin: 0 auto;
        width: 62rem;
        background-color: white;
        border-radius: 5px;
    }

    .imagew {
        text-align: center !important;
        align-items: center !important;
        padding-top: 20px;

    }
    .imagew img{        border-radius: 100%;
}

    .headerr {
        display: flex;
        justify-content: space-between;
    }

    .imgprofile {
        width: 100px;
        height:100px;
    }

    #button1,
    #button2,
    #button3 {
        padding: 7px;
        font-size: 12px;
        border: none;
        width: 362px;
        border-radius: 5px;
        background-color: white;
        color: #00aeef;
    }

    .containeq {
        padding: 20px;
        margin: 20 auto;
        width: 62rem;
        background-color: white;
        border-radius: 5px;
    }

    .profile {
        text-align: center;
    }

    .contactussubmetq {
        align-items: right;
        text-align: right;
        padding: 30px;


    }


    .row {
        text-align: right !important;
        align-items: right !important;
    }

    .qaws {
        height: 25px;
        font-size: 16px;
        width: 200px !important;
        border-radius: 5px;
        text-align: right;
    }

    .asas {
        padding: 3px;
        font-size: 12px;
        width: 100px;
        border-radius: 40px;
        background-color: #00aeef;
        color: white;
    }

    .submet {
        text-align: center;
        padding-top: 10px;
    }

    .sqsq {
        text-align: center;
    }

    .contacts {
        display: none;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .contact {
        align-items: center;
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

    .hyhy {
        display: grid;
        grid-template-columns: 1fr 1fr;


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
    }

    .card {
        background-color: white;
        padding-right: 10px;
        text-align: right;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .number {
        background-color: white;
    }

    .container {
        margin-top: 5rem;

    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .col-md-10 {
        flex: 0 0 83.333333%;
        max-width: 83.333333%;
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .text-center {
        text-align: center;
    }

    .toggle-btn {
        display: inline-block;
        position: relative;
        width: 20px;
        height: 20px;
    }

    .inner-circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .table-body tr:nth-child(odd) {
        background-color: #f9f9f9;
        /* تغيير لون خلفية الصفوف الفردية */
    }

    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge-success {
        color: #155724;
        background-color: #d4edda;
        /* لون خلفية البادج للحالة مكتملة */
    }

    .badge-info {
        color: #0c5460;
        background-color: #d1ecf1;
        /* لون خلفية البادج للحالة تم التأكيد */
    }

    .badge-danger {
        color: #721c24;
        background-color: #f8d7da;
        /* لون خلفية البادج للحالة شحن جزئي */
    }

    .fa {
        font-family: FontAwesome;
        /* تحميل الخطوط المميزة */
    }

    .text-black-50 {
        color: #808080;
        /* رمز لون النص الرمادي */
    }
</style>
