@extends('web.weblayout')
@section('title', 'الصفحة الشخصية | EZM')
@section('content')

<div class="profile-page">
    <div class="profile-page__inner">
        <header class="profile-page__header">
            <h1 class="profile-page__title">الصفحة الشخصية</h1>
            <p class="profile-page__subtitle">إدارة معلوماتك، دوراتك، المفضلة والطلبات</p>
        </header>

        {{-- تبويبات --}}
        <nav class="profile-page__tabs" role="tablist">
            <button type="button" class="profile-page__tab profile-page__tab--active" data-tab="1" aria-selected="true" role="tab">
                <i class="fa-solid fa-user"></i>
                <span>حسابك الشخصي</span>
            </button>
            <button type="button" class="profile-page__tab" data-tab="2" aria-selected="false" role="tab">
                <i class="fa-solid fa-book-open"></i>
                <span>الدورات</span>
            </button>
            <button type="button" class="profile-page__tab" data-tab="3" aria-selected="false" role="tab">
                <i class="fa-solid fa-heart"></i>
                <span>المفضلة</span>
            </button>
        </nav>

        {{-- اللوحة 1: المعلومات الشخصية --}}
        <section class="profile-page__panel profile-page__panel--active" id="profile-panel-1" role="tabpanel">
            <div class="profile-page__card">
                <h2 class="profile-page__card-title">المعلومات الشخصية</h2>
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="profile-form">
                    @csrf
                    @method('PUT')
                    <div class="profile-form__layout">
                        <div class="profile-form__avatar-wrap">
                            <div class="profile-form__avatar-box">
                                <img id="image-preview" class="profile-form__avatar" src="{{ asset('imageprfile/' . $user->image) }}" alt="{{ $user->name }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=160'" width="160" height="160" />
                            </div>
                            <label class="profile-form__file-label">
                                <input type="file" name="image" id="file-input" accept="image/*" class="profile-form__file-input" />
                                <span class="profile-form__file-text"><i class="fa-solid fa-camera"></i> تغيير الصورة</span>
                            </label>
                        </div>
                        <div class="profile-form__fields">
<div class="profile-form__row">
                                    <label class="profile-form__label" for="name">الاسم</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="profile-form__input @error('name') profile-form__input--error @enderror" placeholder="الاسم الكامل" />
                                    @error('name')<span class="profile-form__error">{{ $message }}</span>@enderror
                                </div>
<div class="profile-form__row">
                                    <label class="profile-form__label" for="email">البريد الإلكتروني</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="profile-form__input @error('email') profile-form__input--error @enderror" placeholder="example@email.com" />
                                    @error('email')<span class="profile-form__error">{{ $message }}</span>@enderror
                                </div>
                            <div class="profile-form__row">
                                <label class="profile-form__label" for="phone">رقم الجوال</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="profile-form__input" placeholder="05xxxxxxxx" />
                            </div>
                            <div class="profile-form__row">
                                <label class="profile-form__label" for="address">العنوان</label>
                                <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" class="profile-form__input" placeholder="المدينة، الدولة" />
                            </div>
                            <div class="profile-form__actions">
                                <button type="submit" class="profile-form__btn">حفظ التعديلات</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        {{-- اللوحة 2: الدورات --}}
        <section class="profile-page__panel" id="profile-panel-2" role="tabpanel" hidden>
            <div class="profile-page__card">
                <h2 class="profile-page__card-title">دوراتك</h2>
                @if($courses->isNotEmpty())
                    <div class="profile-courses">
                        @foreach ($courses as $coursess)
                        <article class="profile-course">
                            <div class="profile-course__head">
                                <h3 class="profile-course__name"><a href="{{ route('video', $coursess->id) }}">{{ $coursess->name }}</a></h3>
                                @if($coursess->doctor)
                                <span class="profile-course__doctor"><i class="fa-solid fa-user-md"></i> {{ $coursess->doctor->name }}</span>
                                @endif
                            </div>
                            <p class="profile-course__desc">{{ Str::limit($coursess->discription, 140) }}</p>
                            <p class="profile-course__label">المحتويات:</p>
                            <ul class="profile-course__videos">
                                @foreach ($coursess->video as $videoas)
                                <li>
                                    <a href="{{ route('generate_url', $videoas->id) }}" class="profile-course__video-link">{{ $videoas->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('video', $coursess->id) }}" class="profile-course__cta">عرض الدورة</a>
                        </article>
                        @endforeach
                    </div>
                @else
                    <p class="profile-page__empty"><i class="fa-solid fa-book-open"></i> لا توجد دورات مسجلة بعد. <a href="{{ route('courses') }}">تصفح الدورات</a></p>
                @endif
            </div>
        </section>

        {{-- اللوحة 3: المفضلة --}}
        <section class="profile-page__panel" id="profile-panel-3" role="tabpanel" hidden>
            <div class="profile-page__card">
                <h2 class="profile-page__card-title">دوراتك المفضلة</h2>
                @if($couu->isNotEmpty())
                    <div class="profile-courses">
                        @foreach ($couu as $coursesss)
                        <article class="profile-course">
                            <div class="profile-course__head">
                                <h3 class="profile-course__name"><a href="{{ route('video', $coursesss->id) }}">{{ $coursesss->name }}</a></h3>
                                @if($coursesss->doctor)
                                <span class="profile-course__doctor"><i class="fa-solid fa-user-md"></i> {{ $coursesss->doctor->name }}</span>
                                @endif
                            </div>
                            <p class="profile-course__desc">{{ Str::limit($coursesss->discription, 140) }}</p>
                            <p class="profile-course__label">المحتويات:</p>
                            <ul class="profile-course__videos">
                                @foreach ($coursesss->video as $videoas)
                                <li>
                                    <a href="{{ route('generate_url', $videoas->id) }}" class="profile-course__video-link">{{ $videoas->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('video', $coursesss->id) }}" class="profile-course__cta">عرض الدورة</a>
                        </article>
                        @endforeach
                    </div>
                @else
                    <p class="profile-page__empty"><i class="fa-solid fa-heart"></i> لا توجد دورات في المفضلة. <a href="{{ route('courses') }}">أضف من الدورات</a></p>
                @endif
            </div>
        </section>

        {{-- تغيير كلمة المرور --}}
        <section class="profile-page__card profile-page__card--password">
            <h2 class="profile-page__card-title">تغيير كلمة المرور</h2>
            <form action="{{ route('profile.update1', $user->id) }}" method="POST" class="profile-form profile-form--narrow">
                @csrf
                @method('PUT')
                <div class="profile-form__row">
                    <label class="profile-form__label" for="current_password">كلمة المرور الحالية</label>
                    <input type="password" id="current_password" name="current_password" class="profile-form__input" placeholder="••••••••" required />
                </div>
                <div class="profile-form__row">
                    <label class="profile-form__label" for="new_password">كلمة المرور الجديدة</label>
                    <input type="password" id="new_password" name="new_password" class="profile-form__input" placeholder="••••••••" required />
                </div>
                <div class="profile-form__row">
                    <label class="profile-form__label" for="new_password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="profile-form__input" placeholder="••••••••" required />
                </div>
                <div class="profile-form__actions">
                    <button type="submit" class="profile-form__btn">حفظ كلمة المرور</button>
                </div>
            </form>
        </section>

        {{-- الطلبات --}}
        <section class="profile-page__card profile-page__card--orders">
            <h2 class="profile-page__card-title">سجل الطلبات</h2>
            @if($order->isNotEmpty())
                <div class="profile-orders-wrap">
                    <table class="profile-orders">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الدورة</th>
                                <th>السعر</th>
                                <th>الإيصال</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $orders)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('video', $orders->courses) }}">{{ $orders->courses->name }}</a></td>
                                <td><span class="profile-orders__price">{{ $orders->price }} ر.س</span></td>
                                <td>
                                    @if($orders->image)
                                    <a href="{{ asset('Order_file/' . $orders->image) }}" target="_blank" rel="noopener" class="profile-orders__receipt">عرض</a>
                                    @else
                                    —
                                    @endif
                                </td>
                                <td>
                                    <span class="profile-orders__status profile-orders__status--{{ $orders->status == 1 ? 'done' : 'pending' }}">
                                        {{ $orders->status == 1 ? 'مكتمل' : 'قيد المعالجة' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="profile-page__empty"><i class="fa-solid fa-receipt"></i> لا توجد طلبات حتى الآن.</p>
            @endif
        </section>
    </div>
</div>

<script>
(function() {
    var tabs = document.querySelectorAll('.profile-page__tab');
    var panels = document.querySelectorAll('.profile-page__panel');
    var fileInput = document.getElementById('file-input');
    var imagePreview = document.getElementById('image-preview');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var id = this.getAttribute('data-tab');
            tabs.forEach(function(t) {
                t.classList.remove('profile-page__tab--active');
                t.setAttribute('aria-selected', 'false');
            });
            this.classList.add('profile-page__tab--active');
            this.setAttribute('aria-selected', 'true');
            panels.forEach(function(panel) {
                if (panel.id === 'profile-panel-' + id) {
                    panel.classList.add('profile-page__panel--active');
                    panel.hidden = false;
                } else {
                    panel.classList.remove('profile-page__panel--active');
                    panel.hidden = true;
                }
            });
        });
    });

    if (fileInput && imagePreview) {
        fileInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file && file.type.indexOf('image') === 0) {
                var reader = new FileReader();
                reader.onload = function() { imagePreview.src = reader.result; };
                reader.readAsDataURL(file);
            }
        });
    }
})();
</script>
@endsection
