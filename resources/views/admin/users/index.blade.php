@extends('layouts.admin')

@section('content')

  @if (Session::has('deleted_user'))
    <p class="alert alert-danger">{{ session('deleted_user') }}</p>
  @endif

  @if (Session::has('updated_user'))
    <p class="alert alert-success">{{ session('updated_user') }}</p>
  @endif

  @if (Session::has('created_user'))
    <p class="alert alert-success">{{ session('created_user') }}</p>
  @endif

  <h1>Users</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($users)
        @foreach($users as $user)
          <tr>
            <td><div class="image" style="background-image: url('{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/50x50' }}');"></div></td>
            <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name}}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
@endsection
