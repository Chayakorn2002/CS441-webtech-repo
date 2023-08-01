@extends('layouts.main')

@section('content')
<nav class="flex">
    <a class="ml-2" href="{{ route('about.index') }}">About</a>
    <a class="ml-2" href="{{ route('songs.index') }}">Songs</a>
</nav>
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">Song list</h2>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($songs as $song)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{ $song['title'] }}</h3>
                    <p class="text-gray-600 text-base">{{ $song['artist']['name'] }}</p>
                </div>
                @php
                    $minutes = floor($song['duration'] / 60); // Get the minutes part
                    $seconds = $song['duration'] % 60; // Get the seconds part
                @endphp
                <span class="text-gray-400">{{ $minutes }}:{{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}</span>
            </li>
            @endforeach
        </ul>
    </div>
@endsection