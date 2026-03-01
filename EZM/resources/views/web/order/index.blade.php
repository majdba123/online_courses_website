@extends('web.weblayout')
@section('title', 'إتمام الطلب | ' . ($courses->name ?? 'دورة'))

@section('content')
@php
    $doctor = $courses->doctor ?? null;
    $discount = $courses->discount ?? null;
    $price = (float) $courses->price;
    $discountPercent = $discount ? (float) $discount->discount_percentage : 0;
    $priceAfterDiscount = $discountPercent > 0 ? $price - ($price * $discountPercent / 100) : $price;
@endphp

<div class="order-page">
    <div class="order-page__inner">
        <a href="{{ route('video', $courses->id) }}" class="order-page__back">
            <i class="fa-solid fa-arrow-right"></i> العودة للدورة
        </a>

        <h1 class="order-page__title">إتمام الطلب</h1>
        <p class="order-page__subtitle">تأكيد طلبك وإرفاق إيصال التحويل</p>

        @if ($errors->any())
        <div class="order-page__alert order-page__alert--danger">
            <strong>يرجى تصحيح الأخطاء:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('order.store', $courses->id) }}" method="POST" enctype="multipart/form-data" class="order-form">
            @csrf

            <div class="order-form__grid">
                {{-- ملخص الدورة --}}
                <div class="order-form__card order-form__summary">
                    <h2 class="order-form__card-title">
                        <i class="fa-solid fa-book-open"></i> ملخص الدورة
                    </h2>
                    <div class="order-summary">
                        <h3 class="order-summary__name">{{ $courses->name }}</h3>
                        @if($doctor)
                        <p class="order-summary__meta">
                            <i class="fa-solid fa-user-md"></i> الدكتور: {{ $doctor->name }}
                        </p>
                        @endif
                        @if($courses->discription)
                        <p class="order-summary__desc">{{ Str::limit($courses->discription, 200) }}</p>
                        @endif
                        <div class="order-summary__prices">
                            <div class="order-summary__row">
                                <span>السعر:</span>
                                <strong>{{ number_format($price, 0) }} ر.س</strong>
                            </div>
                            @if($discountPercent > 0)
                            <div class="order-summary__row order-summary__row--discount">
                                <span>خصم {{ $discountPercent }}%:</span>
                                <strong>{{ number_format($priceAfterDiscount, 0) }} ر.س</strong>
                            </div>
                            @endif
                            <div class="order-summary__total">
                                <span>المبلغ المطلوب:</span>
                                <span class="order-summary__total-value">{{ number_format($priceAfterDiscount, 0) }} ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- نموذج الطلب --}}
                <div class="order-form__card">
                    <h2 class="order-form__card-title">
                        <i class="fa-solid fa-receipt"></i> إرفاق إيصال التحويل
                    </h2>
                    <p class="order-form__lead">يرجى تحويل المبلغ عبر شركة الحرمين ثم رفع صورة أو نسخة من إيصال التحويل.</p>

                    <div class="order-form__group">
                        <label class="order-form__label" for="imge">صورة إيصال التحويل <span class="text-danger">*</span></label>
                        <div class="order-form__file-wrap">
                            <input type="file" id="imge" name="imge" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml" class="order-form__file" required />
                            <div class="order-form__file-box" id="fileBox">
                                <i class="fa-solid fa-cloud-arrow-up order-form__file-icon"></i>
                                <span class="order-form__file-text" id="fileText">اختر ملفاً (JPG, PNG, GIF - حد أقصى 2 م.ب)</span>
                            </div>
                        </div>
                    </div>

                    <div class="order-form__actions">
                        <button type="submit" class="order-form__submit">
                            <i class="fa-solid fa-check"></i> تأكيد الطلب
                        </button>
                        <a href="{{ route('video', $courses->id) }}" class="order-form__cancel">إلغاء</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
(function() {
    var input = document.getElementById('imge');
    var fileText = document.getElementById('fileText');
    if (input && fileText) {
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileText.textContent = this.files[0].name;
            } else {
                fileText.textContent = 'اختر ملفاً (JPG, PNG, GIF - حد أقصى 2 م.ب)';
            }
        });
    }
})();
</script>
@endsection
