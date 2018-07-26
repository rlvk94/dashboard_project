@extends('layouts.admin')

@section('content')
  <h1>All Comments</h1>

  @if (count($comments) > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Post</th>
          <th>User</th>
          <th>Comment</th>
          <th>Created</th>
          <th>Replies</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comments as $comment)
          <tr>
            <td><a href="{{ route('home.post', $comment->id) }}">{{ $comment->post->title }}</a></td>
            <td>{{ $comment->user->name }}</td>
            <td>{{ $comment->content }}</td>
            <td>{{ $comment->created_at->diffForHumans() }}</td>
            <td><a href="{{ route('replies.show', $comment->id) }}">{{ $comment->replies->count() }}</a></td>
            <td>
              {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['CommentsController@update', $comment->id]]) !!}
                @if ($comment->is_active === 1)
                  {!! Form::hidden('is_active', 0) !!}
                  {!! Form::submit('Unapprove', ['class'=>'btn danger']) !!}
                @else
                  {!! Form::hidden('is_active', 1) !!}
                  {!! Form::submit('Approve', ['class'=>'btn success']) !!}
                @endif
              {!! Form::close() !!}
            </td>
            <td>
              {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsController@destroy', $comment->id]]) !!}
                {!! Form::submit('Delete', ['class'=>'btn danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No comments</p>
  @endif
@endsection
