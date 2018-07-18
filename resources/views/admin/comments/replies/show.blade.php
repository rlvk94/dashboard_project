@extends('layouts.admin')

@section('content')
  <h1>Replies</h1>

  @if (count($replies) > 0)
    <table class="table">
      <thead>
      <tr>
        <th>Post</th>
        <th>User</th>
        <th>Comment</th>
        <th>Created</th>
        <th></th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach ($replies as $reply)
        <tr>
          <td><a href="{{ route('home.post', $reply->comment->post->id) }}">{{ $reply->comment->post->title }}</a></td>
          <td>{{ $reply->user->name }}</td>
          <td>{{ $reply->content }}</td>
          <td>{{ $reply->created_at->diffForHumans() }}</td>
          <td>
            {!! Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
            @if ($reply->is_active === 1)
              {!! Form::hidden('is_active', 0) !!}
              {!! Form::submit('Unapprove', ['class'=>'btn btn-danger']) !!}
            @else
              {!! Form::hidden('is_active', 1) !!}
              {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
            @endif
            {!! Form::close() !!}
          </td>
          <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
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
