@extends('layouts.admin')

@section('content')
  <h1>Categories</h1>

  <div class="row">
    <div class="col-sm-6">
      {!! Form::open(['method'=>'POST', 'action'=>'CategoriesController@store']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
      @if ($categories)
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Created</th>
              <th>Updated</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>{{ $category->updated_at->diffForHumans() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>

@endsection
