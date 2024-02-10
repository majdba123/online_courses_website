@extends('admin.admin_layout')

@section('content')
    <div class="modal-dialog">
      <div class="modal-content">
        <form action= {{ route('qfa.update', $qfa->id)}}  method="POST" >
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title">QFA</h4>
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
              <label>Quastin</label>
              <input type="text" name="quastion" class="form-control" required  value={{ $qfa->quastion }}>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Answer</label>
                  <textarea name="answee" class="form-control" required></textarea>
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
