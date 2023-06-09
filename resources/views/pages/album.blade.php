@extends('layouts.layouts')

@section('content')
    <script src="{{ asset('src/js/albom.js') }}"></script>
    <script src="{{asset ('src/js/audioplayer.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="{{ asset('src/js/index.js') }}" defer></script>

    {{-- Скрытый div для передачи правильно пути от laravel на js и обратно --}}
    <div class="image-url arrow-right" data-src="{{ asset('src/icon/svg/arrow_right.svg') }}"></div>
    <div class="image-url pause-btn" data-src="{{ asset('src/icon/svg/audio/pause.svg') }}"></div>
    <div class="image-url download-btn" data-src="{{ asset('src/icon/svg/download.svg') }}"></div>

    <section class="albom"> {{-- задний фон обложки --}}
        <div class="albom--view">
            <div class="albom--main">
                <div class="cover">{{-- Обложка альбома --}}</div>
                <div>
                    <div>
                        <h1 class="title-albom">{{ $composition->title }}</h1>
                        <h2 class="author">{{ $composition->maker_name }}</h2>
                    </div>
                    <div class="cover--img">
                        <img src="{{ '/storage/' . $user['avatar_image'] }}" alt="">
                        {{-- <img src="{{ asset('src/image/F-JcoYh2FuU.jpg') }}" alt=""> --}}
                    </div>
                    {{-- <button class="see_release">Прослушать</button> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="albom--list">
        <div>
            <h2>Трек лист</h2>
            {{-- @auth
                @if (Auth::user()->level > 1)
                    <a href="">Редактировать альбом</a>
                @endif
            @endauth --}}
        </div>
        <div>
            <ul class="track-list">

            </ul>
        </div>

        {{-- Аудиоплеер --}}
        <div class="audioplayer">
            <audio id="audio" src="" preload="auto"></audio>
            <div class="progress"></div>

            {{-- <input type="range" min="0" max="1" step="0.01" id="AudioValue" class="progress"> --}}

            <div class="time-start">
                <p class="time-lest">1:15</p>
                {{-- <p class="audio-maker">Going quantum & Hayve - <span class="audio-title">Double Tap</span></p> --}}
            </div>
            <div class="controls">
                <button class="right"><img src="{{asset ('src/icon/svg/audio/arrow_ruight.svg')}}" alt=""></button>
                <button class="play"><img src="{{asset ('src/icon/svg/audio/arrow_left.svg')}}" alt=""></button>
                <button class="pause"><img src="{{asset ('src/icon/svg/audio/pause.svg')}}" alt=""></button>
                <button class="left"><img src="{{asset ('src/icon/svg/audio/play.svg')}}" alt=""></button>
            </div>
            <div class="time-end">
                <div class="value">
                    <img src="{{asset ('src/icon/svg/audio/value_song.svg')}}" alt="">
                    <input type="range" min="0" max="1" step="0.01" id="AudioValue">
                </div>
                <p class="time-all">4:20</p>
            </div>
        </div>

        @auth
            @if (Auth::user()->level > 1)
                <div>
                    <a href="{{ route('addtrack', $album_id) }}" class="add_trek_to_albom"><button><img
                                src="{{ asset('src/icon/svg/cross_add.svg') }}" alt="">Добавить Трек</button></a>
                </div>
            @endif
        @endauth
    </section>

    @include('components.footer')
@endsection
