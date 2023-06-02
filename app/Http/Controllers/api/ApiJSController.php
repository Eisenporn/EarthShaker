<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\composition;
use Illuminate\Http\Request;

class ApiJSController extends Controller
{
    public function endpoint($id)
    {

        $album = album::find($id);

        $composition = composition::query()->where('album_id', '=', $id)->get();

        return response()->json([
            'album'=>$album,
            'composition'=>$composition,
        ]);
    }
}
