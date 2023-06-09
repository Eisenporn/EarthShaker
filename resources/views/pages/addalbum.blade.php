@extends('layouts.layouts')

@section('content')
    <section class="addalbom">
        <div class="back-blur">
            <h1>форма добавления альбома</h1>

            {{-- Вывод ошибок --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form method="POST" action="{{ route('album.AddAlbum') }}" name="addalbom" class="form-albom"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="button-img-cover" for="img-cover">Добавить обложку</label>
                    <input accept=".png, .jpg, .jpeg, .webp" type="file" name="image_preview" id="img-cover">
                </div>
                <div>
                    <label for="title">Название альбома</label>
                    <input type="text" name="title" id="title" placeholder="Название альбома">
                </div>
                <input class="submit_albom" name="addalbom" type="submit" value="Создать альбом">
            </form>
        </div>
    </section>
@endsection
