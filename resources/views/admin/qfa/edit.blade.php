@extends('admin.admin_layout')

@section('content')

<div class="modal-content">
    <form action={{ route('qfa.update', $qfa->id)}} method="POST" >
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
            <h4 class="modal-title">QFA</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Quastin</label>
                <input type="text" name="quastion" class="form-control" required value={{ $qfa->quastion }}>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answee" class="form-control" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    onclick="location.href='{{ route('qfa.index') }}'">Cancel</button>

                <input type="submit" class="btn btn-success" value="update" />
            </div>
    </form>
</div>


@endsection
