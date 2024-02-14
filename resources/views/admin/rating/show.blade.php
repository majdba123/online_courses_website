@extends('admin.admin_layout')


@section('content')
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <form action="{{ route('search.rate') }}" method="get">
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
                <th>Name User <i class="fa fa-sort"></i></th>
                <th>Name Course</th>
                <th>comment <i class="fa fa-sort"></i></th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $rating as $ratings)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ratings->user->name }}</td>
                <td>{{ $ratings->courses->name }}</td>
                <td>{{ $ratings->comment }}</td>
                <td>
                    <form action="{{ route('rate.delete',$ratings->id)}}" method="post">
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
                {!! $rating->links() !!}
             </div>
          </div>
        </div>
      </div>
    </div>



@endsection
