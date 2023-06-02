<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTrackRequest;
use App\Models\composition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function AddTrack(AddTrackRequest $request)
    {
        $validated = $request->validated();
        $validated['maker'] = Auth::user()->username;
        $validated['id_maker'] = Auth::user()->getAuthIdentifier();
        if ($request->file())
        {
            $validated['music_src'] = $request->file('music_src')->store('src/music', 'public');
        }
        composition::query()->create($validated);

        return redirect()->route('album', $validated['album_id']);
    }
}
