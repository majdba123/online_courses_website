@extends('admin.admin_layout')


@section('content')
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">

                <a
                  href="#addEmployeeModal"
                  class="btn btn-success"
                  data-toggle="modal"
                  ><i class="material-icons">&#xE147;</i>
                  <span>ADD DOCTOR</span></a
                >
              </div>
              <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.doctor') }}" method="get">
                      @csrf
                    <input
                      type="text"
                      name="quiry"
                      class="form-control"
                      placeholder="Search&hellip;"
                    />
                    <br>
                    <button type="submit" class="btn btn-primary">Search</button>

                    </form>
                  </div>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name <i class="fa fa-sort"></i></th>
                <th>Spicification</th>
                <th>University <i class="fa fa-sort"></i></th>
                <th>age</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $doctor as $doctors)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $doctors->name }}</td>
                <td>{{ $doctors->spicification }}</td>
                <td>{{ $doctors->university }}</td>
                <td>{{ $doctors->age }}</td>
                <td>
                    <a href="{{ route('doctor.edit' , $doctors->id) }}"  class="edit">
                        <i class="material-icons" data-toggle="tooltip" title="Edit"> &#xE254; </i>
                    </a>

                    <form action="{{ route('doctor.delete',$doctors->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="material-icons" data-toggle="tooltip" title="Delete" >&#xE872;</i></button>
                    </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- ADD Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action= "{{ route('doctor.store')}}" method="POST" >
            @csrf
            @method('POST')
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
                <input type="text" name='name' class="form-control" required />
              </div>
              <div class="form-group">
                <label>spicification</label>
                <input type="text" name="spicification" class="form-control" required />
              </div>
              <div class="form-group">
                <label>university</label>
                <input type="text" name="university" class="form-control" required />
              </div>
              <div class="form-group">
                <label>age</label>
                <input type="number" name="age" class="form-control" required />
              </div>
            </div>
            <div class="modal-footer">
              <input
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
                value="Cancel"
              />
              <input type="submit" class="btn btn-success" value="Add" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit Modal HTML -->

@endsection
