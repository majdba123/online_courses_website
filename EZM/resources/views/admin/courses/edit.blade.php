@extends('admin.admin_layout')

@section('content')
<div class="modal-content">

    <form action="{{ route('courses.update' ,$courses->id )}}" method="POST">
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
            <h4 class="modal-title">Courses</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name='name' class="form-control" value="{{ $courses->name }}" required />
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="text" name="price" class="form-control" value="{{ $courses->price }}" required />
            </div>
            <div class="form-group">
                <label>discription</label>
                <textarea name="discription" class="form-control" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label>Hour of course</label>
            <input type="number" name="time_of_course" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Doctor</label>
            <div class="col-sm-10">
                <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror"
                    name="doctor_id" value="{{ old('doctor_id', $courses->doctor_id) }}" autofocus>
                    @foreach($doctor as $doctors)
                    <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                    @endforeach
                </select>
            </div>
            <label>Discount</label>
            <div class="col-sm-10">
                <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror"
                    name="discount_id" value="{{ old('discount_id', $courses->discount_id) }}" autofocus>
                    @foreach($discount as $discounts)
                    <option value="{{ $discounts->id }}">{{ $discounts->discount_percentage }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default"
                onclick="location.href='{{ route('index.courses') }}'">Cancel</button>
            <input type="submit" class="btn btn-success" value="Update" />
        </div>
    </form>
</div>
@endsection
