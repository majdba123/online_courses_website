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
                  <span>Add Video</span></a
                >
              </div>
              <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.video') }}" method="get">
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
                <th>Name <i class="fa fa-sort"></i></th>
                <th>video_url</th>
                <th>discription <i class="fa fa-sort"></i></th>
                <th>time_of_video</th>
                <th>courses_id</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $video as $videos)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $videos->name }}</td>
                <td>{{ $videos->video_url }}</td>
                <td>
                    {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $videos->discription) !!}
                </td>
                <td>{{ $videos->time_of_video }}</td>
                <td>{{ $videos->courses->name }}</td>
                <td>
                    <a href="{{ route('edit.video' , $videos->id) }}"  class="edit">
                        <i class="material-icons" data-toggle="tooltip" title="Edit"> &#xE254; </i>
                    </a>

                    <form action="{{ route('video.delete',$videos->id)}}" method="post">
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
          <form action= "{{ route('video.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('POST')
            <div class="modal-header">
              <h4 class="modal-title">Video</h4>
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
                <label>discription</label>
                <textarea name="discription" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>minute of video </label>
                <input type="number" name="time_of_video" class="form-control" required />
              </div>
              <div class="form-group">
                <label>video_Path</label>
                <input type="file" name="video_url" required>
              </div>
              <div class="col-sm-10">
                <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="courses_id" autofocus>
                    @foreach($courses as $coursess)
                        <option value="{{ $coursess->id }}">{{ $coursess->name }}</option>
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