@extends('layouts.admin')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
  <h1>Upload Media</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'MediaController@store', 'class'=>'dropzone', 'files'=>TRUE]) !!}
    <div class="fallback">
      {!! Form::file('file') !!}
    </div>
  {!! Form::close() !!}
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js" charset="utf-8"></script>
@endsection
