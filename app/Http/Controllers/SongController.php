<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\User;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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

        return response()->json(compact('songs'),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artist_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
            'release_year' => 'required|integer',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $song = Song::create([
            'artist_name' => $request->get('artist_name'),
            'song_title' => $request->get('song_title'),
            'release_year' =>  $request->get('release_year')
        ]);

        return response()->json(compact('song'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artist_name' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
            'release_year' => 'required|integer',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $song = Song::find($request->get('id'));

        $song->artist_name = $request->get('artist_name');
        $song->song_title = $request->get('song_title');
        $song->release_year =  $request->get('release_year');

        $song->save();
        return response()->json(compact('song'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $song = Song::find($request->id);
        $song->delete();

        return response()->json(true,200);
    }
}
