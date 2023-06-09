<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\composition;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

class IndexContorller extends Controller
{
    public function home()
    {
        $album = album::orderBy('created_at', 'DESC')->limit(3)->get();
        $formattedDates = [];
        foreach ($album as $item) {
            $formattedDates[] = Carbon::parse($item['created_at'])->format('d.m.Y');
        }

        $lasted_releases = album::orderBy('created_at', 'DESC')->limit(1)->get();


        return view('pages.index', ['album' => $album, 'formattedDates' => $formattedDates, 'lasted_releases'=>$lasted_releases]);
    }

    public function catalog()
    {
        $albums = album::orderBy('created_at', 'DESC')->get();

        $OnlyThreeAlbums = album::orderBy('created_at', 'DESC')->limit(3)->get();
        $users = [];

        foreach ($OnlyThreeAlbums as $album) {
            $users[] = User::find($album->maker_id);
        }

        return view('pages.catalog', ['albums' => $albums->all(), 'users'=>$users]);
    }

    public function signin()
    {
        return view('pages.signin');
    }

    public function signup()
    {
        return view('pages.signup');
    }

    public function addalbum()
    {
        return view('pages.addalbum');
    }

    public function profile()
    {
        $user_info = Auth::user();
        return view('pages.profile', ['userinfo' => $user_info]);
    }

    public function album($item)
    {
        $album = album::query()->find($item);
        $user = User::find($album->maker_id);
        if ($album === null) {
            return view('pages.album', ['album_id' => $item]);
        } else {
            return view('pages.album', ['composition' => $album, 'album_id' => $item, 'user'=>$user]);
        }
    }

    public function addtrack($album_id)
    {
        return view('pages.addtrack', ['album_id' => $album_id]);
    }
}
