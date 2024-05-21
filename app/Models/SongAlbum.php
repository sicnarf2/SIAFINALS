<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongAlbum extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'artist',
        'genre',
        'release_date',
        // Add any other attributes you want to allow mass assignment for
    ];
}
