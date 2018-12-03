<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'song_title',
        'artist_name',
        'release_year'
    ];
}
