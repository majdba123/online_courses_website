@extends('admin.admin_layout')


@section('content')
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.inquire') }}" method="get">
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
                <td>{{ ++$i }}</td>
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
        </div>
      </div>
    </div>
@endsection
