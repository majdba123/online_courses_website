@extends('admin.admin_layout')

@section('content')
<div class="modal-content">


    <form action="{{ route('achievement.update' ,$achievement->id )}}" method="POST">
        @csrf
        @method('PUT')
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
        <div class="modal-header">
            <h4 class="modal-title">Achievement</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>title</label>
                <input type="text" name="title" value="{{ $achievement->title }}" class="form-control"
                    required></textarea>
            </div>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Achievement</label>
                <textarea name="achievement" class="form-control" value="{{ $achievement->achievement }}"
                    required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    onclick="location.href='{{ route('achievement.index') }}'">Cancel</button>

                <input type="submit" class="btn btn-success" value="Update" />
            </div>
    </form>
</div>

@endsection
