@extends('layouts.layouts')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="{{ asset('src/js/index.js') }}" defer></script>
    <script src="{{asset ('src/js/ShareLinkCopy.js')}}" defer></script>

    <!-- Главная секция -->
    <main class="main">

        <div class="swiper main">

            <div class="swiper-wrapper">
                <div class="swiper-slide slide1"
                style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$album[0]['image_preview']}}') center center / cover no-repeat">
                    <div class="slide_main">
                        <div>
                            <h1 class="title">{{$album[0]['title']}}</h1>
                            <h2 class="maker">{{$album[0]['maker_name']}}</h2>
                        </div>
                        <div>
                            <p class="date-time"><span>Дата релиза</span> - {{$formattedDates[0]}}</p>
                            <a href="{{ route('album', $album[0]['id']) }}"><button class="see_realese">Прослушать релиз</button></a>
                            <a href="{{ route('album', $album[0]['id']) }}" class="share-link"><button class="share">Поделиться</button></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slide2"
                style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$album[1]['image_preview']}}') center center / cover no-repeat">
                    <div class="slide_main">
                        <div>
                            <h1 class="title">{{$album[1]['title']}}</h1>
                            <h2 class="maker">{{$album[1]['maker_name']}}</h2>
                        </div>
                        <div>
                            <p class="date-time"><span>Дата релиза</span> - {{$formattedDates[1]}}</p>
                            <a href="{{ route('album', $album[1]['id']) }}"><button class="see_realese">Прослушать релиз</button></a>
                            <a href="{{ route('album', $album[1]['id']) }}" class="share-link"><button class="share">Поделиться</button></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slide3"
                style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, #090909 100%), linear-gradient(270deg, rgba(0, 0, 0, 0) 69.79%, #090909 100%), url('/storage/{{$album[2]['image_preview']}}') center center / cover no-repeat">
                    <div class="slide_main">
                        <div>
                            <h1 class="title">{{$album[2]['title']}}</h1>
                            <h2 class="maker">{{$album[2]['maker_name']}}</h2>
                        </div>
                        <div>
                            <p class="date-time"><span>Дата релиза</span> - {{$formattedDates[2]}}</p>
                            <a href="{{ route('album', $album[2]['id']) }}"><button class="see_realese">Прослушать релиз</button></a>
                            <a href="{{ route('album', $album[2]['id']) }}" class="share-link"><button class="share">Поделиться</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Секция о нас -->
    <section class="about_main">
        <div>
            <a href="{{route('album', $lasted_releases[0]['id'])}}">
                <div>
                    <div>
                        <h3>Последние релизы</h3>
                        <hr>
                    </div>
                    <div class="cart_back one"
                    style="background: url(/storage/{{ $lasted_releases[0]['image_preview'] }}) center center/ cover"
                    >
                        <img src="/storage/{{ $lasted_releases[0]['image_preview'] }}" alt="">
                        <h4>Hopeful</h4>
                    </div>
                </div>
            </a>
            <a href="">
                <div>
                    <div>
                        <h3>Наши артисты</h3>
                        <hr>
                    </div>
                    <div class="cart_back two">
                        <img src="{{ asset('src/image/TolyoMachine.jpg') }}" alt="">
                        <h4>Tokyo Machine</h4>
                    </div>
                </div>
            </a>
            <a href="">
                <div>
                    <div>
                        <h3>Новости лейбла</h3>
                        <hr>
                    </div>
                    <div class="cart_back three">
                        <img src="{{ asset('src/image/V42z6zHEALk.jpg') }}" alt="">
                        <h4>Летний фестиваль электронной музыки в Казани</h4>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Секция другой музыки -->
    <section class="other_music">
        <div>
            <div>
                <h3>Использование другой музыки</h3>
                <hr>
            </div>
            <div class="cart_other_music">
                <div>
                    <h4 id="gold_h4">Золотой Сотрясатель</h4>
                    <div>
                        <img src="{{asset ('src/icon/svg/Gold.svg')}}" alt="">
                    </div>
                    <p class="title_other_music">Подключите золотую подписку, чтобы использовать лицензированную музыку,
                        высокого качества, в своих творческих проектах</p>
                    <a href=""><button>Узнать больше</button></a>
                </div>
                <div>
                    <h4>Партнерство</h4>
                    <div></div>
                    <p class="title_other_music">Откройте для себя уникальные партнерские отношения и разнообразную
                        аудиторию, которые приняли бренд Сострясатель.</p>
                    <a href=""><button>Узнать больше</button></a>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
