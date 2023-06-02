<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class composition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'maker',
        'albom',
        'is_hidden',
        'album_id',
        'music_src',
        'image_preview',
        'id_maker',
    ];
}
