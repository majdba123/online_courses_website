@extends('admin.admin_layout')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session('success') }}
        </div>
        @endif
<form action= "{{ route('goal.update' ,$goal->id )}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="modal-header">
      <h4 class="modal-title">Goals</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
          <label>title</label>
          <input type="text" name="title"  value="{{ $goal->title }}" class="form-control" required></textarea>
        </div>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Goals</label>
        <textarea name="golas" class="form-control" value="{{ $goal->golas }}" required></textarea>
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="location.href='{{ route('goal.index') }}'">Cancel</button>

      <input type="submit" class="btn btn-success" value="Update" />
    </div>
  </form>
</div>
</div>
</div>
@endsection
