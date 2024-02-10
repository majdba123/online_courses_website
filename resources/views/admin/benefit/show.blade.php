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
                  <span>ADD benefit</span></a
                >
              </div>
              <div class="search-box">
                <i class="material-icons">&#xE8B6;</i>
                <form action="{{ route('search.benefit') }}" method="get">
                  @csrf
                <input
                  type="text"
                  name="quiry"
                  class="form-control"
                  placeholder="Search&hellip;"
                />
                <button type="submit">search</button>
                </form>
              </div>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>title <i class="fa fa-sort"></i></th>
                <th>benefit</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $benefit as $benefits)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $benefits->title }}</td>
                <td>{{ $benefits->benefits }}</td>
                <td>
                    <a href="{{ route('benefit.edit' , $benefits->id) }}"  class="edit">
                        <i class="material-icons" data-toggle="tooltip" title="Edit"> &#xE254; </i>
                    </a>

                    <form action="{{ route('benefit.delete',$benefits->id)}}" method="post">
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
          <form action= "{{ route('benefit.store')}}" method="POST" >
            @csrf
            @method('POST')
            <div class="modal-header">
              <h4 class="modal-title">benefit</h4>
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
                  <label>title</label>
                  <input type="text" name="title" class="form-control" required></textarea>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>benefit</label>
                  <textarea name="benefits" class="form-control" required></textarea>
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
