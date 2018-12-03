<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view ('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'artist_name'=>'required',
            'song_title'=> 'required',
            'release_year' => 'required|integer'
          ]);
          $song = new Song([
            'artist_name' => $request->get('artist_name'),
            'song_title'=> $request->get('song_title'),
            'release_year'=> $request->get('release_year')
          ]);
          $song->save();
          return redirect('/songs')->with('success', 'Song has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);

        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'artist_name'=>'required',
            'song_title'=> 'required',
            'release_year' => 'required|integer'
          ]);

          $song = Song::find($id);
          $song->artist_name = $request->get('artist_name');
          $song->song_title = $request->get('song_title');
          $song->release_year = $request->get('release_year');
          $song->save();

          return redirect('/songs')->with('success', 'Song has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();

        return redirect('/songs')->with('success', 'Song has been deleted Successfully');
    }
}
