@extends('admin.admin_layout')
@section('title', 'العروض')

@section('content')
<div class="container-xl">
    <div class="admin-card">
        <div class="admin-card__header">
            <h2 class="admin-card__title">العروض والخصومات</h2>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <form action="{{ route('search.Discount') }}" method="get" class="d-flex gap-2">
                    @csrf
                    <input type="text" name="query" class="form-control" placeholder="بحث..." style="width: 180px;" />
                    <button type="submit" class="admin-btn admin-btn--primary"><i class="fa-solid fa-search"></i> بحث</button>
                </form>
                <button type="button" class="admin-btn admin-btn--success" data-bs-toggle="modal" data-bs-target="#addDiscountModal">
                    <i class="fa-solid fa-plus"></i> إضافة خصم
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نسبة الخصم</th>
                        <th>تاريخ الانتهاء</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discount as $discounts)
                    <tr>
                        <td>{{ ($discount->currentPage() - 1) * $discount->perPage() + $loop->iteration }}</td>
                        <td>{{ $discounts->discount_percentage }}</td>
                        <td>{{ $discounts->expired_at }}</td>
                        <td>
                            <a href="{{ route('edit.Discount', $discounts->id) }}" class="admin-btn admin-btn--outline btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('Discount.delete', $discounts->id) }}" method="post" class="d-inline">
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
            {!! $discount->links() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="addDiscountModal" tabindex="-1" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('Discount.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDiscountModalLabel">إضافة خصم</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="admin-form__group">
                        <label class="admin-form__label">نسبة الخصم</label>
                        <input type="text" name="discount_percentage" class="admin-form__control form-control" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-form__label">تاريخ الانتهاء</label>
                        <input type="date" name="expired_at" class="admin-form__control form-control" required />
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
