<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\composition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexContorller extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function catalog()
    {
        $albums = album::query()->get();
        return view('pages.catalog', ['albums'=>$albums->all()]);
    }

    public function signin(){
        return view('pages.signin');
    }

    public function signup(){
        return view('pages.signup');
    }

    public function addalbum()
    {
        return view('pages.addalbum');
    }

    public function profile()
    {
        $user_info = Auth::user();
        return view('pages.profile', ['userinfo'=>$user_info]);
    }

    public function album($item)
    {
        $album=album::query()->find($item);
        $composition = composition::query()->where('album_id', '=', $album->id)->get();
        // dd($composition->first());
        if ($album === null)
        {
            return view('pages.album', ['album_id'=>$item]);
        }
        else
        {
            return view('pages.album', ['composition'=>$album, 'album_id'=>$item]);
        }
    }

    public function addtrack($album_id)
    {
        return view('pages.addtrack', ['album_id'=>$album_id]);
    }
}
