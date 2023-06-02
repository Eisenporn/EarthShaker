@extends('layouts.layouts')

@section('content')
    <!-- Секция недавних релизов -->
    <section class="catalog">
        <h1><span>Сотрясателя</span><br> музыка</h1>

        <div class="swiper_catalog">
            <h2>Вышедшие альбомы</h2>

            <div class="swiper catalog">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide1">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content ">

                                <div class="scc scc-1"></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="{{ asset('src/image/F-JcoYh2FuU.jpg') }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset('src/image/B03v4lsGaiA.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>DOUBLE TAP</span><br>GOING QUANTUM & HAYVE</h2>
                                    </div>
                                    <div>
                                        <a href=""><button>Прослушать релиз</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide2">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content">

                                <div class="scc scc-2"></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="../image/F-JcoYh2FuU.jpg" alt="">
                                        </div>
                                        <div>
                                            <img src="../image/B03v4lsGaiA.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>Haze</span><br>PROFF</h2>
                                    </div>
                                    <div>
                                        <a href=""><button>Прослушать релиз</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide3">
                        <div class="slider--catalog">
                            <div class="slider--catalog-content">

                                <div class="scc scc-3"></div>

                                <div class="catalog--title-text">
                                    <div class="catalog--img">
                                        <div>
                                            <img src="{{ asset('src/image/F-JcoYh2FuU.jpg') }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset('src/image/B03v4lsGaiA.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog--title-h1-h2">
                                        <h2><span>journey</span><br>yeter & klaxx</h2>
                                    </div>
                                    <div>
                                        <a href=""><button>Прослушать релиз</button></a>
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
                        <a href="{{ route('addalbum') }}"><button><img src="{{ asset('src/icon/svg/cross_add.svg') }}"
                                    alt="">Добавить трек</button></a>
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
                            <a href="{{route ('album', $item)}}">
                                <img src="{{ '/storage/' . $item['image_preview'] }}" alt="">
                                <p>{{$item['title']}}</p>
                                <p>{{$item['maker_name']}}</p>
                            </a>
                        </div>
                    @endforeach
                    {{-- <div>
                        <a href="">
                            <img src="{{ asset('src/image/Double_Tap.jpg') }}" alt="">
                            <p>Double tap</p>
                            <p>GOING QUANTUM & HAYVE</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/Journey.jpg') }}" alt="">
                            <p>journey</p>
                            <p>yetep & klaxx</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/Haze.jpg') }}" alt="">
                            <p>lar</p>
                            <p>haze</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/ENDLESS.png') }}" alt="">
                            <p>ENDLESS (BEST OF ME)</p>
                            <p>AFINITY & NEVVE</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/godlands.png') }}" alt="">
                            <p>SLEEPER / SICKO</p>
                            <p>GODLANDS</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/1024.png') }}" alt="">
                            <p>Codes</p>
                            <p>OddKidOut feat. Macntaj</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/ENDLESS.png') }}" alt="">
                            <p>ENDLESS (BEST OF ME)</p>
                            <p>AFINITY & NEVVE</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/godlands.png') }}" alt="">
                            <p>SLEEPER / SICKO</p>
                            <p>GODLANDS</p>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="{{ asset('src/image/1024.png') }}" alt="">
                            <p>Codes</p>
                            <p>OddKidOut feat. Macntaj</p>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
