<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'poster_path',
        'overview',
        'release_date',
        'original_title',
        'original_language',
        'genre_ids',
        'estado',
    ];
}
