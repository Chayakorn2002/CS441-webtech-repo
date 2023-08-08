<?php

namespace App\Http\Controllers;

use App\Models\Enums\PlaylistAccessibility;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlaylistController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['index', 'create', 'store']);
    //     // $this->middleware('guest')->except([]); 
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Playlist::class);

        $user = Auth::user();
        $playlists = $user->playlists;
        $playlists = Playlist::get();
        return view('playlists.index', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Playlist::class);

        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Playlist::class);

        $request->validate([
            'name' => 'required|string|min:4|max:100',
            // 'accessibility' => 'required|in:public,private',
        ]);

        $playlist = new Playlist();
        $playlist->name = $request->get('name');
        $playlist->accessibility = PlaylistAccessibility::PRIVATE;
        $playlist->user()->playlists()->save($playlist); // $user->playlists()->save($playlist

        return redirect()->route('playlists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Playlist $playlist)
    {
        Gate::authorize('update', $playlist);

        return view('playlists.edit', [
            'playlist' => $playlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        Gate::authorize('update', $playlist);
        
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:100'],
        ]);

        $playlist->name = $request->get('name');
        $playlist->save();

        return redirect()->route('playlists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        
    }
}
