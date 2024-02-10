@extends('admin.admin_layout')
@section('content')
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">

            </div>
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>introduction</th>
                <th>youtube</th>
                <th>facebook </th>
                <th>linkedin</th>
                <th>phone</th>
                <th>gmail</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>YOUR URL</td>
                <td>{{ $webs->introduction }}</td>
                <td>{{ $webs->youtube }}</td>
                <td>{{ $webs->facebook }}</td>
                <td>{{ $webs->linkedin }}</td>
                <td>{{ $webs->phone }}</td>
                <td>{{ $webs->gmail }}</td>
                <td>
                    <a href="{{ route('edit.Admin', $webs->id) }}"  class="edit">
                        <i class="material-icons" data-toggle="tooltip" title="Edit"> &#xE254; </i>
                    </a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Total Users</div>
                        <div class="card-body">
                            {{ $userCount }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Registered Users</div>
                        <div class="card-body">
                            {{ $userRegister }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Course Options</div>
                        <div class="card-body">
                            <form action="{{ route('search.Admin') }}">
                                <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="courses_id" autofocus>
                                    @foreach($courses as $coursess)
                                        <option value="{{ $coursess->id }}">{{ $coursess->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('course'))
                <p>{{ session('course') }}</p>
            @endif
        </div>
        </div>
      </div>
    </div>





@endsection

