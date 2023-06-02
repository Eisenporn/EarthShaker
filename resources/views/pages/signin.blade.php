@extends('layouts.layouts')

@section('content')
    <div class="auth_back">
        <div class="title_auth">
            <h1><span>Войти в</span> <br> Сотрясатель</h1>
        </div>

        {{-- Вывод ошибок --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="form_auth">
            <form action="{{route ('auth.signin')}}" method="POST" name="auth">
                @csrf
                <div>
                    <label for="email">ЭЛЕКТРОННАЯ ПОЧТА</label>
                    <input type="text" name="email" id="email" placeholder="Электронная почта">
                </div>
                <div>
                    <label for="password">ПАРОЛЬ</label>
                    <input type="password" name="password" id="password" placeholder="Пароль">
                </div>
                <div class="accaunt">
                    <p>Нет аккаунта? <a href="{{ route('signup') }}">Создайте его</a></p>
                </div>
                <div>
                    <input type="submit" value="Войти">
                </div>
            </form>
        </div>
    </div>
@endsection
