@extends('admin.admin_layout')
@section('title', 'المزايا')

@section('content')
<div class="container-xl">
    <div class="admin-card">
        <div class="admin-card__header">
            <h2 class="admin-card__title">المزايا</h2>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <form action="{{ route('search.benefit') }}" method="get" class="d-flex gap-2">
                    @csrf
                    <input type="text" name="query" class="form-control" placeholder="بحث..." style="width: 180px;" />
                    <button type="submit" class="admin-btn admin-btn--primary"><i class="fa-solid fa-search"></i> بحث</button>
                </form>
                <button type="button" class="admin-btn admin-btn--success" data-bs-toggle="modal" data-bs-target="#addBenefitModal">
                    <i class="fa-solid fa-plus"></i> إضافة ميزة
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>الميزة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($benefits as $benefitss)
                    <tr>
                        <td>{{ ($benefits->currentPage() - 1) * $benefits->perPage() + $loop->iteration }}</td>
                        <td>{{ $benefitss->title }}</td>
                        <td>{{ Str::limit($benefitss->benefits, 80) }}</td>
                        <td>
                            <a href="{{ route('benefit.edit', $benefitss->id) }}" class="admin-btn admin-btn--outline btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('benefit.delete', $benefitss->id) }}" method="post" class="d-inline">
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
            {!! $benefits->links() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="addBenefitModal" tabindex="-1" aria-labelledby="addBenefitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('benefit.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBenefitModalLabel">إضافة ميزة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="admin-form__group">
                        <label class="admin-form__label">العنوان</label>
                        <input type="text" name="title" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">الميزة</label>
                        <textarea name="benefits" class="admin-form__control form-control" required></textarea>
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
