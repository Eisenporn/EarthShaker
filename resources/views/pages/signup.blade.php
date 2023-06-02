@extends('layouts.layouts')

@section('content')
    <div class="auth_back reg_back">
        <div class="title_auth">
            <h1><span>создание</span> <br> аккаунта</h1>
        </div>

        {{-- Вывод ошибок --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        
        <div class="form_auth form_reg">
            <form method="POST" name="signup" action="{{ route('auth.signup') }}">
                @csrf
                <div>
                    <label for="email">ЭЛЕКТРОННАЯ ПОЧТА</label>
                    <input type="text" name="email" id="email" placeholder="Электронная почта" value="">
                </div>
                <div class="form_pass">
                    <label for="password">ПАРОЛЬ</label>
                    <input type="password" name="password" id="password" placeholder="Пароль">
                    <p>Пароль должен состоять как минимум из 6 символов</p>
                </div>
                <div class="form_pass">
                    <label for="pass2">ПОВТОРИТЕ ПАРОЛЬ</label>
                    <input type="password" name="pass2" id="pass2" placeholder="Повторите пароль">
                </div>
                <div>
                    <label for="username">Псевдоним</label>
                    <input type="text" name="username" id="username" placeholder="Псевдоним" value="">
                </div>
                <div class="fullname">
                    <div>
                        <label for="firstname">Имя</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Имя" value="">
                    </div>
                    <div>
                        <label for="lastname">Фамилия</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Фамилия" value="">
                    </div>
                </div>
                <div>
                    <input type="submit" value="зарегистрироваться">
                </div>
            </form>
        </div>
    </div>
@endsection
