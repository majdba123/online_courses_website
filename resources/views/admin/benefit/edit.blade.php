@extends('admin.admin_layout')

@section('content')
<form action= "{{ route('benefit.update' ,$benefit->id )}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="modal-header">
      <h4 class="modal-title">Benefitt</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
          <label>title</label>
          <input type="text" name="title" value="{{ $benefit->title }}" class="form-control" required></textarea>
        </div>
    </div>
    <div class="modal-body">
            <div class="form-group">
              <label>Benfit</label>
              <textarea name="benefits" class="form-control" required></textarea>
            </div>
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="location.href='{{ route('benfit.index') }}'">Cancel</button>
      <input type="submit" class="btn btn-success" value="Update" />
    </div>
  </form>
</div>
</div>
</div>
@endsection
