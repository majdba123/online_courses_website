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
                    <form action="{{ route('search.orders') }}" method="get">
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
                <th>name courses</th>
                <th>image</th>
                <th>price</th>
                <th>status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $order as $orders)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $orders->user->name }}</td>
                <td>{{ $orders->courses->name }}</td>
                <td><a href={{ asset('Order_file/'.$orders->image) }}><img src="{{ asset('Order_file/'.$orders->image) }}" width="100" height="100" alt="not found"/></a></td>
                <td>{{ $orders->price }}</td>
                <td>
                    <a href="{{ route('orders.update' , $orders->id) }}"   class="btn btn-sm btn-{{ $orders->status ? 'success' : 'danger' }}">
                        {{ $orders->status ? 'complete' : 'panding'  }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('orders.delete',$orders->id)}}" method="post">
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
