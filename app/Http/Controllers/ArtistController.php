<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Song;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::get();
        return view('artists.index', [
            'artists' => $artists
        ],);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artist_name = $request->get('name');
        if ($artist_name == null) {
            return redirect()->back()->with('error', 'Artist name is required');
        }
        
        $artist = new Artist();
        $artist->name = $artist_name;
        $artist->save();
        return redirect()->route('artists.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $artist = Artist::findOrFail($id);
    //     return view('artists.show', [
    //         'artist' => $artist,
    //     ],);
    // }

    public function show(Artist $artist)
    {
        return view('artists.show', [
            'artist' => $artist,
        ],);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', [
            'artist' => $artist,
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->name = $request->get('name');
        $artist->save();
        return redirect()->route('artists.show', ['artist' => $artist]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        if ($artist->songs->isEmpty()) {
            $artist->delete();
            return redirect()->route('artists.index');
        }
        return redirect()->back()->with('error', 'Artist cannot be deleted because it has songs');
    }

    public function createSong(Artist $artist) {
        return view('artists.create-song', [
            'artist' => $artist,
        ],);
    }
    
    public function storeSong(Request $request, Artist $artist) {
        $song = new Song(); // use App\Models\Song;
        $song->title = $request->get('title');
        $song->duration = $request->get('duration');

        $artist->songs()->save($song);

        return redirect()->route('artists.show', ['artist' => $artist]);
    }
}