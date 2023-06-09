@extends('layouts.layouts')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="{{ asset('src/js/index.js') }}" defer></script>


    <!-- Секция недавних релизов -->
    <section class="catalog">
        <h1><span>Сотрясателя</span><br> музыка</h1>

        <div class="swiper_catalog">
            <h2>Вышедшие альбомы</h2>

            <div class="swiper catalog">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide1"
                    style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$albums[0]['image_preview']}}') center center / cover no-repeat">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content ">

                                <div class="scc scc-1"
                                style="background: url('/storage/{{$albums[0]['image_preview']}}') center center / cover no-repeat"
                                ></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="{{'/storage/' . $users[0]['avatar_image']}}" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>{{$albums[0]['title']}}</span><br>{{$albums[0]['maker_name']}}</h2>
                                    </div>
                                    <div>
                                        <a href="{{ route('album', $albums[0]['id']) }}"><button>Прослушать релиз</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide2"
                    style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$albums[1]['image_preview']}}') center center / cover no-repeat">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content">

                                <div class="scc scc-2"
                                style="background: url('/storage/{{$albums[1]['image_preview']}}') center center / cover no-repeat"
                                ></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="{{'/storage/' . $users[1]['avatar_image']}}" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>{{$albums[1]['title']}}</span><br>{{$albums[1]['maker_name']}}</h2>
                                    </div>
                                    <div>
                                        <a href="{{ route('album', $albums[1]['id']) }}"><button>Прослушать релиз</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide3"
                    style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$albums[2]['image_preview']}}') center center / cover no-repeat">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content">

                                <div class="scc scc-3"
                                style="background: url('/storage/{{$albums[2]['image_preview']}}') center center / cover no-repeat"
                                ></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="{{'/storage/' . $users[2]['avatar_image']}}" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>{{$albums[2]['title']}}</span><br>{{$albums[2]['maker_name']}}</h2>
                                    </div>
                                    <div>
                                        <a href="{{ route('album', $albums[2]['id']) }}"><button>Прослушать релиз</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Непосредтсвенно сам каталог -->
    <section class="catalog--container">
        <div class="catalog--container-title">
            <h2>Вышедшие альбомы</h2>
            <div>
                @auth
                    @if (Auth::user()->level > 1)
                        <!-- Кнопка появлятся только под админкой -->
                        <a href="{{ route('addalbum') }}"><button><img src="{{ asset('src/icon/svg/cross_add.svg') }}" alt="">Добавить трек</button></a>
                    @endif
                @endauth


                <a href=""><button><img src="{{ asset('src/icon/svg/search.svg') }}" alt=""></button></a>
                <a href=""><button><img src="{{ asset('src/icon/svg/filter.svg') }}"
                            alt="">ФИЛЬТР</button></a>
                <a href=""><button><img src="{{ asset('src/icon/svg/sort.svg') }}"
                            alt="">СОРТИРОВКА</button></a>
            </div>
        </div>

        <div class="catalog--container-release">
            <div class="catalog--view-grid">
                <div class="catalog--grid">
                    @foreach ($albums as $item)
                        <div>
                            <a href="{{ route('album', $item) }}">
                                <img src="{{ '/storage/' . $item['image_preview'] }}" alt="">
                                <p>{{ $item['title'] }}</p>
                                <p>{{ $item['maker_name'] }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
