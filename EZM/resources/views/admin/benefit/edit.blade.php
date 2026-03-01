@extends('admin.admin_layout')
@section('title', 'تعديل الميزة')

@section('content')
<div class="admin-card" style="max-width: 640px;">
    <div class="admin-card__header">
        <h2 class="admin-card__title">تعديل الميزة</h2>
        <a href="{{ route('benefit.index') }}" class="admin-btn admin-btn--outline"><i class="fa-solid fa-arrow-right"></i> رجوع</a>
    </div>
    <form action="{{ route('benefit.update', $benefit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="admin-form__group">
            <label class="admin-form__label">العنوان</label>
            <input type="text" name="title" class="admin-form__control form-control" value="{{ old('title', $benefit->title) }}" required />
        </div>
        <div class="admin-form__group">
            <label class="admin-form__label">الميزة</label>
            <textarea name="benefits" class="admin-form__control form-control" required>{{ old('benefits', $benefit->benefits) }}</textarea>
        </div>
        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="admin-btn admin-btn--success"><i class="fa-solid fa-check"></i> حفظ</button>
            <a href="{{ route('benefit.index') }}" class="admin-btn admin-btn--outline">إلغاء</a>
        </div>
    </form>
</div>
@endsection
