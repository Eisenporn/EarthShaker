@extends('layouts.layouts')

@section('content')

    <section class="addalbom">
        <div class="back-blur">
            <h1>форма добавления треков в альбом</h1>

            {{-- Вывод ошибок --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{route ('track.addtrack')}}" method="POST" name="addtrack" class="form-albom" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="album_id" value="{{$album_id}}">
                <div class="upload-track">
                    <label class="btn-track" for="track">Добавить треки</label>
                    <input accept=".mp3, .wav" type="file" class="addtrack" name="music_src" id="track">
                </div>
                <div>
                    <label for="title">Название трека</label>
                    <input type="text" name="name" id="title" placeholder="Название трека">
                </div>
                <input class="submit_albom" name="addtrack" type="submit" value="Добавить трек">
            </form>

        </div>
    </section>
@endsection
