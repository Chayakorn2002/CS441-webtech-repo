@extends('layouts.main')

@section('content')
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">Playlist</h2>
        </div>
        <div class="bg-pink-100 py-2 px-4">
            <a class="inline-block py-2 px-4 border border-gray-700 bg-pink-100"
               href="{{ route('playlists.create') }}">
                Create New Playlist
            </a>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($playlists as $playlist)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{ $playlist->name }}</h3>
                    <p class="text-gray-600 text-base">{{ $playlist->user->name }}</p>
                    <p class="text-gray-600 text-base">{{ $playlist->songs->count() }}</p>
                </div>
                {{-- @php
                    $minutes = floor($song['duration'] / 60); // Get the minutes part
                    $seconds = $song['duration'] % 60; // Get the seconds part
                @endphp --}}
                <div class="text-gray-400">
                    <a 
               href="{{ route('playlists.edit', ['playlist' => $playlist]) }}">
                        Edit 
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection