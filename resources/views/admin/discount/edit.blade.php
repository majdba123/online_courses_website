@extends('admin.admin_layout')

@section('content')
    <div class="modal-dialog">
      <div class="modal-content">
        <form action= {{ route('Discount.update', $discount->id)}}  method="POST" >
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title">Discount</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>percentage</label>
              <input type="text" name='discount_percentage' class="form-control" required  value={{ $discount->discount_percentage }}>
            </div>
            <div class="form-group">
              <label>expired_at</label>
              <input type="date" name="expired_at" class="form-control"  value={{ $discount->expired_at }} required >
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="location.href='{{ route('index.Discount') }}'">Cancel</button>

            <input type="submit" class="btn btn-success" value="update" />
          </div>
        </form>
      </div>
    </div>

@endsection
