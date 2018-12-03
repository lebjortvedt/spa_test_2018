@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Song
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('songs.store') }}">
          <div class="form-group">
              @csrf
              <label for="artist_name">Artist name:</label>
              <input type="text" class="form-control" name="artist_name"/>
          </div>
          <div class="form-group">
              <label for="song_title">Song title :</label>
              <input type="text" class="form-control" name="song_title"/>
          </div>
          <div class="form-group">
              <label for="release_year">Release year:</label>
              <input type="number" class="form-control" name="release_year"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
