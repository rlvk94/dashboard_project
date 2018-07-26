@extends('layouts.admin')

@section('content')
  <h1>Create User</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>TRUE]) !!}

      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', null) !!}

      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', null) !!}

      {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null) !!}

      {!! Form::select('is_active', ['' => 'Select Status', 1 => 'Active', 0 => 'Inactive'], null) !!}

      {!! Form::file('photo_id', null) !!}

      {!! Form::label('password', 'Password:') !!}
      {!! Form::password('password') !!}

    {!! Form::submit('Create User') !!}
  {!! Form::close() !!}

  @include('includes.errors')
@endsection
