<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Artist::count() > 0) {
            echo "There are some artists in database \n";
            return;
        }

        $artist = new Artist();
        $artist->name = "Oasis";
        $artist->save();

        $artist = new Artist();
        $artist->name = "The Toys";
        $artist->save();

        $artist = new Artist();
        $artist->name = "Maroon 5";
        $artist->save();

        Artist::factory(100)->create();
    }
}
