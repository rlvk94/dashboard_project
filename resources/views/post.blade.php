@extends('layouts.blog-post')

@section('content')
  <!-- Title -->
  <h1>{{ $post->title }}</h1>

  <!-- Author -->
  <p class="lead">
      by <a href="#">{{ $post->user->name }}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

  <hr>

  <!-- Post Content -->
  <p>{{ $post->content }}</p>

  <hr>

  <!-- Blog Comments -->

  @if (Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'CommentsController@store']) !!}
          {!! Form::hidden('post_id', $post->id) !!}
          <div class="form-group">
            {!! Form::textarea('content', null, ['class'=>'form-control', 'style'=>'resize: none;', 'rows'=>4]) !!}
          </div>

            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
  @endif

  <hr>

  <!-- Posted Comments -->

  @if (count($comments) > 0)
    <!-- Comment -->
    @foreach ($comments as $comment)
      <div class="media">
        <a class="pull-left" href="#">
          <img height="64" class="media-object" src="{{ $comment->user->photo->file }}" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading">{{ $comment->user->name }}
            <small>{{ $comment->created_at->diffForHumans() }}</small>
          </h4>
          <p>{{ $comment->content }}</p>

          @if (count($comment->replies) > 0)
            @foreach ($comment->replies as $reply)
              @if($reply->is_active === 1)
                <!-- Nested Comment -->
                <div class="media">
                  <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{ $reply->user->photo->file }}" alt="">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">{{ $reply->user->name }}
                      <small>{{ $reply->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{ $reply->content }}</p>
                  </div>
                </div>
              @endif
            @endforeach
          @endif

          <button class="toggle-reply-form btn btn-primary">Reply</button>

          {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store', 'class'=>'reply-form'])!!}
          {!! Form::hidden('comment_id', $comment->id) !!}
          <div class="form-group" style="margin-top: 20px;">
            {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>2]) !!}
          </div>

          {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    @endforeach
  @endif
@endsection
