@extends('layouts.layouts')

@section('content')
    <section class="profile">
        <div class="back-blur blur-profile">
            <h1>личный кабинет</h1>
            <div class="user-info">
                <div class="form_auth">

                    {{-- Вывод ошибок --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="image-profile">
                        <form method="post">
                            <input type="file" id="imageInput" name="avatar_image"
                                accept="image/png, image/jpeg, image/jpg"  hidden>
                            <input type="hidden" id="getIdUser" value="{{ Auth::user()->getAuthIdentifier() }}">
                            {{-- @csrf --}}
                            <label for="imageInput" class="image-label">
                                <img id="image-element" src="/storage/{{ $userinfo->avatar_image }}">
                            </label>
                        </form>
                        {{-- Скрипт --}}
                        <script src="{{ asset('src/js/ImageProfile.js') }}"></script>
                    </div>

                    <form method="POST" action="{{ route('profile.updatedGeneric') }}" name="change_generic"
                        class="form-info">
                        @csrf
                        <h2>Общая информация</h2>
                        <div>
                            <div>
                                <label for="">Имя</label>
                                <input type="text" required name="firstname" value="{{ $userinfo->firstname }}">
                            </div>
                            <div>
                                <label for="">Фамилия</label>
                                <input type="text" required name="lastname" value="{{ $userinfo->lastname }}">
                            </div>
                        </div>
                        <div>
                            <input class="button-save" type="submit" value="Сохранить">
                        </div>
                        <div class="line"></div>
                    </form>

                    <form method="POST" action="{{ route('profile.updatedEmail') }}" name="change_email" class="form-info">
                        @csrf
                        <h2>Изменение электронной почты</h2>
                        <div>
                            <label for="">Текущая электронная почта</label>
                            <input type="email" name="current_email" readonly value="{{ $userinfo->email }}">
                        </div>
                        <div>
                            <label for="">Новая электронная почта</label>
                            <input type="email" name="email" required name="email"
                                placeholder="Новая электронная почта">
                        </div>
                        <div>
                            <input class="button-save" type="submit" value="Сохранить">
                        </div>
                        <div class="line"></div>
                    </form>

                    <form method="POST" action="{{ route('profile.updatedPassword') }}" name="change_password"
                        class="form-info">
                        @csrf
                        <h2>Изменение пароля</h2>
                        <div>
                            <label for="">Текущий пароль</label>
                            <input type="password" required name="current_password" placeholder="Текущий пароль">
                        </div>
                        <div>
                            <label for="">Новый пароль</label>
                            <input type="password" required name="password" placeholder="Новый пароль">
                        </div>
                        <div>
                            <input class="button-save" type="submit" value="Сохранить">
                        </div>
                        <div class="line"></div>
                    </form>
                </div>
            </div>

            @include('components.footer')
        </div>
    </section>
@endsection
