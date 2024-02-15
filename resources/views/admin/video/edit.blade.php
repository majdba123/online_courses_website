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
<form action= "{{ route('video.update' ,$video->id ) }}" enctype="multipart/form-data" method="POST" >
    @csrf
    @method('PUT')
    <div class="modal-header">
      <h4 class="modal-title">Videos</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name='name' class="form-control" value="{{ $video->name }}" required />
      </div>
      <div class="form-group">
        <label>discription</label>
        <textarea name="description" maxlength="65535"  value="{{ $video->discription }}" class="form-control"></textarea>
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
        <button type="button" class="btn btn-default" onclick="location.href='{{ route('index.video') }}'">Cancel</button>

      <input type="submit" class="btn btn-success" value="Update" />
    </div>
  </form>
</div>
</div>
</div>
@endsection
