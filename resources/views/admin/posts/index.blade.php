@extends('layouts.admin')

@section('content')
  @if (Session::has('deleted_post'))
    <p class="alert alert-danger">{{ session('deleted_post') }}</p>
  @endif

  @if (Session::has('updated_post'))
    <p class="alert alert-success">{{ session('updated_post') }}</p>
  @endif

  @if (Session::has('created_post'))
    <p class="alert alert-success">{{ session('created_post') }}</p>
  @endif

  <h1>All Posts</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($posts)
        @foreach($posts as $post)
          <tr>
            <td><img src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/50x50' }}" height="50"></td>
            <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
            <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
            <td>{{ $post->user->name}}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
@endsection
