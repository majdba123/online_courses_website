@extends('admin.admin_layout')

@section('content')
<form action= "{{ route('update.Admin', $web->id) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="modal-header">
      <h4 class="modal-title">web</h4>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-hidden="true"
      >
        &times;
      </button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>introduction</label>
        <input type="text" name='introduction' class="form-control" value="{{ $web->introduction }}" required />
      </div>
      <div class="form-group">
        <label>youtube</label>
        <input type="text" name="youtube" class="form-control"  value="{{ $web->youtube }}"  />
      </div>
      <div class="form-group">
        <label>facebook</label>
        <input type="text" name="facebook" class="form-control" value="{{ $web->facebook }}"  />
      </div>
      <div class="form-group">
        <label>linkedin</label>
        <input type="text" name="linkedin"   value="{{ $web->linkedin }}">
      </div>
      <div class="form-group">
        <label>phone</label>
        <input type="text" name="phone"   value="{{ $web->phone }}">
      </div>
      <div class="form-group">
        <label>gmail</label>
        <input type="text" name="gmail"   value="{{ $web->gmail }}">
      </div>

    <div class="modal-footer">
      <input
        type="button"
        class="btn btn-default"
        data-dismiss="modal"
        value="Cancel"
      />
      <input type="submit" class="btn btn-success" value="Update" />
    </div>
  </form>
</div>
</div>
</div>
@endsection
