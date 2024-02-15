@extends('admin.admin_layout')


@section('content')

    <div class="container-xl">
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
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-4">
              <form action="{{ route('search.inquire') }}" method="get">

                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                      @csrf
                    <input
                      type="text"
                      name="quiry"
                      class="form-control"
                      placeholder="Search&hellip;"
                    />
                    <br>

                  </div>
                  <button type="submit" class="btn btn-primary">Search</button>
                    </form>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name User</th>
                <th>subject</th>
                <th>email</th>
                <th>discription</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $inquire as $inquires)
            <tr>
                <td>
                    {{ ($inquire->currentPage() - 1) * $inquire->perPage() + $loop->iteration }}
                </td>
                <td>{{ $inquires->user->name }}</td>
                <td>{{ $inquires->subject }}</td>
                <td>{{$inquires->email}}</td>
                <td>{{ $inquires->discription }}</td>
                <td>
                    <form action="{{ route('inquire.delete',$inquires->id)}}" method="post">
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
                {!! $inquire->links() !!}
             </div>
          </div>
        </div>
      </div>
    </div>
@endsection
