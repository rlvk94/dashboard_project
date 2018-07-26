@extends('layouts.admin')

@section('content')
  <h1>Create Post</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>TRUE]) !!}

      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}

      {!! Form::label('category_id', 'Category:') !!}
      {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}

      {!! Form::label('photo_id', 'Photo:') !!}
      {!! Form::file('photo_id', ['class'=>'form-control']) !!}

      {!! Form::label('content', 'Content:') !!}
      {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>6]) !!}

      {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}

  @include('includes.errors')
@endsection

@include('includes.tinymce')