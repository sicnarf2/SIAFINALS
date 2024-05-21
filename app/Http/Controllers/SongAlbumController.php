<?php

namespace App\Http\Controllers;

use App\Models\SongAlbum;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class SongAlbumController extends Controller
{
    public function index()
    {
        $albums = SongAlbum::orderBy('id')->get();
        return view('song_album', ['albums' => $albums]);
    }

    public function generateCSV()
    {
        $albums = SongAlbum::orderBy('id')->get();

        $filename = 'song_album.csv';
        $file = fopen('php://temp', 'w+');

        fputcsv($file, ['ID', 'Title', 'Artist', 'Genre', 'Release Date']);

        foreach ($albums as $sa) {
            fputcsv($file, [
                $sa->id,
                $sa->title,
                $sa->artist,
                $sa->genre,
                $sa->release_date,
            ]);
        }

        rewind($file);
        $csv = stream_get_contents($file);
        fclose($file);

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function generatePDF()
    {
        $albums = SongAlbum::orderBy('id')->get();
        $pdf = Pdf::loadView('song_album-list', compact('albums'));
        return $pdf->download('song_album.pdf');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');

        $csvData = array_map('str_getcsv', file($file));

        foreach ($csvData as $row) {
            $title = $row[0];
            $artist = $row[1];
            $genre = $row[2];
            $release_date = $row[3];

            // Validate release_date format
            try {
                $release_date = Carbon::createFromFormat('Y-m-d', $release_date)->format('Y-m-d');
            } catch (\Exception $e) {
                // Handle invalid date format
                continue; // Skip this row
            }

            SongAlbum::create([
                'title' => $title,
                'artist' => $artist,
                'genre' => $genre,
                'release_date' => $release_date,
            ]);
        }


        return redirect()->route('song_album')->with('success', 'Album imported successfully.');
    }
}
