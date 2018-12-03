@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Artist name</td>
          <td>Song title</td>
          <td>Release year</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $song)
        <tr>
            <td>{{$song->id}}</td>
            <td>{{$song->artist_name}}</td>
            <td>{{$song->song_title}}</td>
            <td>{{$song->release_year}}</td>
            <td><a href="{{ route('songs.edit',$song->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('songs.destroy', $song->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
