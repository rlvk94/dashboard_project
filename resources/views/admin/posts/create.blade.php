@extends('layouts.admin')

@section('content')
  <h1>Create Post</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>TRUE]) !!}
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
      {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}

  @include('includes.errors')
@endsection
