<!-- Шапка и бургер меню -->
<header>
    <a href="{{ route('home') }}"><img src="{{ asset('src/icon/svg/logo_white.svg') }}" alt=""></a>
    <img src="{{ asset('src/icon/svg/burger.svg') }}" alt="" class="burger_buttom">
</header>
<div class="burger_menu">
    <!-- <div class="burger"> -->
    <div class="burger_window">
        <div>
            <div>
                <a href=""><img src="{{ asset('src/icon/svg/logo_white.svg') }}" alt="">
                    <p>Сотрясатель</p>
                </a>
                <img src="{{ asset('src/icon/svg/cross.svg') }}" alt="" class="burger_buttom_close">
            </div>
            <div>
                <ul>
                    <li><a href="{{ route('catalog') }}">Музыка</a></li>
                    <li><a href="">О нас</a></li>
                    <li><a href="">Другое</a></li>
                    {{-- <li><a href="">Подписка</a></li>
                    <li><a href="">Стать артистом</a></li> --}}
                </ul>
            </div>
        </div>
        @guest
            <div>
                <a href="{{ route('signin') }}"><button>Войти</button></a>
                <a href="{{ route('signup') }}"><button>Регистрация</button></a>
            </div>
        @endguest
        @auth
        <div>
            <a href="{{route ('profile')}}"><button>{{Auth::user()->username}}</button></a>
            <a href="{{route ('auth.logout')}}"><button>Выход</button></a>
        </div>
        @endauth

    </div>
    <!-- </div> -->
</div>
