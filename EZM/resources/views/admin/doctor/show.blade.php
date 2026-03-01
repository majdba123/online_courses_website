@extends('admin.admin_layout')
@section('title', 'الأطباء')

@section('content')
<div class="container-xl">
    <div class="admin-card">
        <div class="admin-card__header">
            <h2 class="admin-card__title">الأطباء</h2>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <form action="{{ route('search.doctor') }}" method="get" class="d-flex gap-2">
                    @csrf
                    <input type="text" name="query" class="form-control" placeholder="بحث..." style="width: 180px;" />
                    <button type="submit" class="admin-btn admin-btn--primary"><i class="fa-solid fa-search"></i> بحث</button>
                </form>
                <button type="button" class="admin-btn admin-btn--success" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="fa-solid fa-plus"></i> إضافة طبيب
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>التخصص</th>
                        <th>الجامعة</th>
                        <th>العمر</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctor as $doctors)
                    <tr>
                        <td>{{ ($doctor->currentPage() - 1) * $doctor->perPage() + $loop->iteration }}</td>
                        <td>{{ $doctors->name }}</td>
                        <td>{{ $doctors->spicification }}</td>
                        <td>{{ $doctors->university }}</td>
                        <td>{{ $doctors->age }}</td>
                        <td>
                            <a href="{{ route('doctor.edit', $doctors->id) }}" class="admin-btn admin-btn--outline btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('doctor.delete', $doctors->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger btn-sm" onclick="return confirm('هل تريد الحذف؟');"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {!! $doctor->links() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('doctor.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDoctorModalLabel">إضافة طبيب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="admin-form__group">
                        <label class="admin-form__label">الاسم</label>
                        <input type="text" name="name" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">التخصص</label>
                        <input type="text" name="spicification" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">الجامعة</label>
                        <input type="text" name="university" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">العمر</label>
                        <input type="number" name="age" class="admin-form__control form-control" required />
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
