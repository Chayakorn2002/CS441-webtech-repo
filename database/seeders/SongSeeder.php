<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Song::count() > 0) {
            echo "There are some songs in database \n";
            return;
        }

        // $song = new Song();
        // $song->title = "River";
        // $song->artist = "Miley Cyrus";
        // $song->duration = 3 * 60 + 20;
        // $song->save();

        // $song = new Song();
        // $song->title = "unday Morning";
        // $song->artist = "Maroon 5";
        // $song->duration = 4 * 60 + 50;
        // $song->save();

        // $song = new Song();
        // $song->title = "Roll with it";
        // $song->artist = "Oasis";
        // $song->duration = 3 * 60 + 44;
        // $song->save();

        Song::factory(100)->create();
    }
}