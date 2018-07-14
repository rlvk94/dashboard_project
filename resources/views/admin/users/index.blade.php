@extends('layouts.admin')

@section('content')
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
            <td><img src="{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/50x50' }}" height="50"></td>
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
