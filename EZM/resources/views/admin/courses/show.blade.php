@extends('admin.admin_layout')
@section('title', 'الدورات')

@section('content')
<div class="container-xl">
    <div class="admin-card">
        <div class="admin-card__header">
            <h2 class="admin-card__title">الدورات</h2>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <form action="{{ route('search.courses') }}" method="get" class="d-flex gap-2">
                    @csrf
                    <input type="text" name="query" class="form-control" placeholder="بحث..." style="width: 180px;" />
                    <button type="submit" class="admin-btn admin-btn--primary"><i class="fa-solid fa-search"></i> بحث</button>
                </form>
                <button type="button" class="admin-btn admin-btn--success" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="fa-solid fa-plus"></i> إضافة دورة
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>السعر</th>
                        <th>الوصف</th>
                        <th>مدة الدورة</th>
                        <th>الدكتور</th>
                        <th>نسبة الخصم</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $coursess)
                    <tr>
                        <td>{{ ($courses->currentPage() - 1) * $courses->perPage() + $loop->iteration }}</td>
                        <td>{{ $coursess->name }}</td>
                        <td>{{ $coursess->price }}</td>
                        <td>{!! Str::limit(strip_tags(preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $coursess->discription)), 60) !!}</td>
                        <td>{{ $coursess->time_of_course }}</td>
                        <td>{{ $coursess->doctor->name ?? '—' }}</td>
                        <td>{{ $coursess->discount->discount_percentage ?? '—' }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $coursess->id) }}" class="admin-btn admin-btn--outline btn-sm" title="تعديل"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('courses.delete', $coursess->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger btn-sm" title="حذف" onclick="return confirm('هل تريد الحذف؟');"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {!! $courses->links() !!}
        </div>
    </div>
</div>

{{-- مودال إضافة دورة --}}
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">إضافة دورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="admin-form__group">
                        <label class="admin-form__label">الاسم</label>
                        <input type="text" name="name" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">السعر</label>
                        <input type="text" name="price" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">الوصف</label>
                        <textarea name="discription" class="admin-form__control form-control" maxlength="65535" required></textarea>
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">مدة الدورة (ساعات)</label>
                        <input type="number" name="time_of_course" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">الدكتور</label>
                        <select name="doctor_id" class="admin-form__control form-select" required>
                            @foreach($doctor as $doctors)
                                <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">الخصم</label>
                        <select name="discount_id" class="admin-form__control form-select" required>
                            @foreach($discount as $discounts)
                                <option value="{{ $discounts->id }}">{{ $discounts->discount_percentage }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="admin-btn admin-btn--outline" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="admin-btn admin-btn--success">إضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
