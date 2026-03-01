@extends('admin.admin_layout')
@section('title', 'لوحة التحكم')

@section('content')
<div class="admin-dashboard">
    <h1 class="admin-page-title">لوحة التحكم</h1>

    <div class="admin-stats">
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $userCount }}</div>
            <div class="admin-stat__label">إجمالي المستخدمين</div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $userRegister }}</div>
            <div class="admin-stat__label">المستخدمون المسجلون</div>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card__header">
            <h2 class="admin-card__title">إعدادات الموقع (روابط)</h2>
            <a href="{{ route('edit.Admin', $webs->id) }}" class="admin-btn admin-btn--primary">
                <i class="fa-solid fa-pen"></i> تعديل
            </a>
        </div>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>الحقل</th>
                        <th>القيمة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>فيديو التعريف</strong></td>
                        <td><a href="{{ $webs->introduction }}" target="_blank" rel="noopener">{{ Str::limit($webs->introduction, 50) }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>يوتيوب</strong></td>
                        <td><a href="{{ $webs->youtube }}" target="_blank" rel="noopener">{{ $webs->youtube }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>فيسبوك</strong></td>
                        <td><a href="{{ $webs->facebook }}" target="_blank" rel="noopener">{{ $webs->facebook }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>لينكدإن</strong></td>
                        <td><a href="{{ $webs->linkedin }}" target="_blank" rel="noopener">{{ $webs->linkedin }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>الهاتف</strong></td>
                        <td>{{ $webs->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>البريد</strong></td>
                        <td>{{ $webs->gmail }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="admin-card">
        <h2 class="admin-card__title" style="margin-bottom: 1rem;">عدد الطلبات حسب الدورة</h2>
        <form action="{{ route('search.Admin') }}" method="get" class="d-flex flex-wrap gap-3 align-items-end">
            <div class="admin-form__group mb-0" style="min-width: 220px;">
                <label class="admin-form__label" for="courses_id">اختر الدورة</label>
                <select id="courses_id" name="courses_id" class="admin-form__control form-select">
                    @foreach($courses as $coursess)
                        <option value="{{ $coursess->id }}">{{ $coursess->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="admin-btn admin-btn--primary">عرض العدد</button>
        </form>
        @if (session('course'))
        <p class="mt-4 mb-0">
            <strong>عدد الطلبات المكتملة لهذه الدورة:</strong>
            <span class="admin-stat__value" style="font-size: 1.5rem;">{{ session('course') }}</span>
        </p>
        @endif
    </div>
</div>
@endsection
