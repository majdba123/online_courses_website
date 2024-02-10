@extends('admin.admin_layout')

@section('content')
    <div class="modal-dialog">
      <div class="modal-content">
        <form action= {{ route('doctor.update', $doctor->id)}}  method="POST" >
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title">Doctor</h4>
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
              <label>Name</label>
              <input type="text" name='name' class="form-control" required  value={{ $doctor->name }}>
            </div>
            <div class="form-group">
              <label>spicification</label>
              <input type="text" name="spicification" class="form-control"  value={{ $doctor->spicification }} required >
            </div>
            <div class="form-group">
              <label>university</label>
              <input type="text" name="university" class="form-control"  value={{ $doctor->university }} required >
            </div>
            <div class="form-group">
              <label>age</label>
              <input type="number" name="age" class="form-control"  value={{ $doctor->age }} required >
            </div>
          </div>
          <div class="modal-footer">
            <input
              type="button"
              class="btn btn-default"
              data-dismiss="modal"
              value="Cancel"
            />
            <input type="submit" class="btn btn-success" value="update" />
          </div>
        </form>
      </div>
    </div>

@endsection
