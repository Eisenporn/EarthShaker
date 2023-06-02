<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAlbumRequest;
use App\Models\album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function AddAlbum(AddAlbumRequest $request)
    {
        $validated = $request->validated();
        $validated['maker_name']=Auth::user()->username;
        $validated['maker_id']= Auth::user()->getAuthIdentifier();

        if ($request->file('image_preview'))
        {
            $validated['image_preview'] = $request->file('image_preview')->store('src/image/album_preview', 'public');
        }
        album::query()->create($validated);
        return redirect()->route('catalog');
    }
}
