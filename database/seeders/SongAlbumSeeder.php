<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongAlbumSeeder extends Seeder
{
    public function run()
    {
        $songAlbums = [
            [
                'artist' => 'Juan Karlos',
                'title' => 'Buwan',
                'genre' => 'Alternative Music',
                'release_date' => '2022-05-16',
            ],
            [
                'artist' => 'Itchyworms',
                'title' => 'Akin ka na lang',
                'genre' => 'Pop',
                'release_date' => '2022-05-16',
            ],
            [
                'artist' => 'Rivermaya',
                'title' => 'Himala',
                'genre' => 'Alternative Rock Band',
                'release_date' => '2022-05-16',
            ],
            [
                'artist' => 'POT',
                'title' => 'Yugyugan na',
                'genre' => 'Funk',
                'release_date' => '2022-05-16',
            ],
            [
                'artist' => 'Bruno Mars',
                'title' => 'Uptown Funk',
                'genre' => 'R&B',
                'release_date' => '2022-05-16',
            ],
        ];

        foreach ($songAlbums as $album) {
            DB::table('song_albums')->insert($album);
        }
    }
}
