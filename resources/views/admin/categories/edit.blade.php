@extends('layouts.admin')

@section('content')
  <h1>Edit Category</h1>

  <div class="row">
    <div class="col-sm-6">
      {!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoriesController@update', $category->id]]) !!}
        <div class="form-group">
          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['CategoriesController@destroy', $category->id]]) !!}
      <div class="form-group">
        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>

@endsection
