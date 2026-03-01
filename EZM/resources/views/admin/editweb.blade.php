@extends('admin.admin_layout')
@section('title', 'تعديل إعدادات الموقع')

@section('content')
<div class="admin-card" style="max-width: 640px;">
    <div class="admin-card__header">
        <h2 class="admin-card__title">تعديل إعدادات الموقع</h2>
        <a href="{{ route('index.Admin') }}" class="admin-btn admin-btn--outline"><i class="fa-solid fa-arrow-right"></i> رجوع</a>
    </div>
    <form action="{{ route('update.Admin', $web->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="admin-form__group">
            <label class="admin-form__label">رابط فيديو التعريف</label>
            <input type="url" name="introduction" class="admin-form__control form-control" value="{{ old('introduction', $web->introduction) }}" />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">يوتيوب</label>
            <input type="url" name="youtube" class="admin-form__control form-control" value="{{ old('youtube', $web->youtube) }}" />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">فيسبوك</label>
            <input type="url" name="facebook" class="admin-form__control form-control" value="{{ old('facebook', $web->facebook) }}" />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">لينكدإن</label>
            <input type="url" name="linkedin" class="admin-form__control form-control" value="{{ old('linkedin', $web->linkedin) }}" />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">الهاتف</label>
            <input type="text" name="phone" class="admin-form__control form-control" value="{{ old('phone', $web->phone) }}" />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">البريد الإلكتروني</label>
            <input type="email" name="gmail" class="admin-form__control form-control" value="{{ old('gmail', $web->gmail) }}" />
        </div>
        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="admin-btn admin-btn--success"><i class="fa-solid fa-check"></i> حفظ</button>
            <a href="{{ route('index.Admin') }}" class="admin-btn admin-btn--outline">إلغاء</a>
        </div>
    </form>
</div>
@endsection
