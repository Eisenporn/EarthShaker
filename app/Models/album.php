<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    protected $fillable = [
        'maker_id',
        'title',
        'maker_name',
        'image_preview'
    ];
}
