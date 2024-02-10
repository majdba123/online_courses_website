@extends('admin.admin_layout')

@section('content')
<form action= "{{ route('video.update' ,$video->id ) }}" enctype="multipart/form-data" method="POST" >
    @csrf
    @method('PUT')
    <div class="modal-header">
      <h4 class="modal-title">Videos</h4>
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
        <input type="text" name='name' class="form-control" value="{{ $video->name }}" required />
      </div>
      <div class="form-group">
        <label>discription</label>
        <input type="text" name="discription" class="form-control"  value="{{ $video->discription }}"  />
      </div>
      <div class="form-group">
        <label>time_of_video</label>
        <input type="text" name="time_of_video" class="form-control" value="{{ $video->time_of_video }}"  />
      </div>
      <div class="form-group">
        <label>video_Path</label>
        <input type="text" name="video_url"   value="{{ $video->video_url }}">
      </div>
      <div class="form-group">
        <label>courses</label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="courses_id" value="{{ old('courses_id', $video->courses_id) }}" autofocus>
                @foreach($courses as $coursess)
                    <option value="{{ $coursess->id }}">{{ $coursess->name }}</option>
                @endforeach
            </select>
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
