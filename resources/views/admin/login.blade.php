@extends('layouts.app')

@section('title-block')
    Авторизация
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Авторизация
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        @if( $user )
            <div class="big-text">
                Вы уже авторизованы
            </div>
            <a href="{{ route('logout') }}">Выйти из системы</a>
        @else
            <form action="{{ route('login') }}" method="post" class="main-form">
                @csrf
                <label for="phone">
                    Логин
                    <input type="text" name="login">
                </label>

                <label for="password">
                    Пароль
                    <input type="password" name="password">
                </label>

                <div class="modal__btn">
                    <button type="submit" class="main-btn">Войти</button>
                </div>
            </form>
        @endif


    </section>


@endsection
