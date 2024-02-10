@extends('admin.admin_layout')


@section('content')
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
              <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.user') }}" method="get">
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
                <th>Name User</th>
                <th>email</th>
                <th>Rloe</th>
                <th>status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $user as $users)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->type_user }}</td>
                <td>
                    <a href="{{ route('user.update' , $users->id) }}"   class="btn btn-sm btn-{{ $users->status ? 'success' : 'danger' }}">
                        {{ $users->status ? 'Enable' : 'Disable'  }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('user.delete',$users->id)}}" method="post">
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
