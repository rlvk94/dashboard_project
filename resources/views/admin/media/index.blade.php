@extends('layouts.admin')

@section('content')
  <h1>All Media</h1>

  @if ($media)
    <div class="row">
      <div class="col-sm-12">
        <div style="display: flex; flex-wrap: wrap;">
          @foreach ($media as $photo)
            <div class="mediaItemContainer" style="position: relative; margin: 0 10px 10px 0;">
              <div class="mediaImage" style="position: relative; z-index: 2; background-image: url('{{ $photo->file }}'); height: 200px; width: 200px; background-size: cover; background-position: center; border-radius: 4px;"></div>
              <div class="checkToggle"><i class="far fa-check fa-2x"></i></div>
              <div class="buttons">
                <a href="{{ route('media.edit', $photo->id) }}" style="display: block; margin-right: 10px; background-color: #9DE0AD; border-radius: 50%; line-height: 40px; text-align: center; width: 40px; height: 40px;"><i style="color: white;" class="fal fa-pen"></i></a>
                {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id]]) !!}
                  {!! Form::button('<i class="fal fa-times fa-2x" style="color: white;"></i>', ['style'=>'width: 40px; height: 40px; background-color: #e84a5f; border: none; border-radius: 50%;', 'type'=>'submit']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endif
@endsection
