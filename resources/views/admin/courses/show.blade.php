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
                  <span>ADD Courses</span></a
                >
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.courses') }}" method="get">
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
                <th>name <i class="fa fa-sort"></i></th>
                <th>price</th>
                <th>discription <i class="fa fa-sort"></i></th>
                <th>time_of_course</th>
                <th>doctor</th>
                <th>discount_percentage</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $courses as $coursess)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $coursess->name }}</td>
                <td>{{ $coursess->price }}</td>
                <td>
                     {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $coursess->discription) !!}
                </td>
                <td>{{ $coursess->time_of_course }}</td>
                <td>{{ $coursess->doctor->name }}</td>
                <td>{{ $coursess->discount->discount_percentage }}</td>
                <td>
                    <a href="{{ route('courses.edit' , $coursess->id) }}"  class="edit">
                        <i class="material-icons" data-toggle="tooltip" title="Edit"> &#xE254; </i>
                    </a>

                    <form action="{{ route('coursesr.delete',$coursess->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="material-icons" data-toggle="tooltip" title="Delete" >&#xE872;</i></button>
                    </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div>
            <div class="d-flex justify-content-center">
                {!! $courses->links() !!}
             </div>
          </div>
        </div>
      </div>
    </div>


    <!-- ADD Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action= "{{ route('courses.store')}}" method="POST" >
            @csrf
            @method('POST')
            <div class="modal-header">
              <h4 class="modal-title">Courses</h4>
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
                <label>price</label>
                <input type="text" name="price" class="form-control" required />
              </div>
              <div class="form-group">
                <label>discription</label>
                <textarea name="discription" class="form-control" maxlength="65535" required></textarea>
              </div>
              <div class="form-group">
                <label>Hour 0f course</label>
                <input type="number" name="time_of_course" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Doctor</label>
                <div class="col-sm-10">
                    <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="doctor_id"  autofocus>
                        @foreach($doctor as $doctors)
                            <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label>Discount</label>
                <div class="col-sm-10">
                    <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="discount_id" autofocus>
                        @foreach($discount as $discounts)
                            <option value="{{ $discounts->id }}">{{ $discounts->discount_percentage }}</option>
                        @endforeach
                    </select>
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
