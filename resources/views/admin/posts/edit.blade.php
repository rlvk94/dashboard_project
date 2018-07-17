@extends('layouts.admin')

@section('content')
  <h1>Edit Post</h1>

  <div class="row">
    <div class="col-sm-3">
      <img src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/300x300' }}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">
      {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>TRUE]) !!}
        <div class="form-group">
          {!! Form::label('title', 'Title:') !!}
          {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('category_id', 'Category:') !!}
          {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('photo_id', 'Photo:') !!}
          {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('content', 'Content:') !!}
          {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>6]) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
          <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-3']) !!}
          </div>
        {!! Form::close() !!}
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      @include('includes.errors')
    </div>
  </div>
@endsection
