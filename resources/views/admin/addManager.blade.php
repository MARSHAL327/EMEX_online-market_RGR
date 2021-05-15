@extends('layouts.app')

@section('title-block')
    Добавление контент-менеджера
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Добавление контент-менеджера
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="login">
                Логин менеджера
                <input type="text" name="login">
            </label>

            <label for="password">
                Пароль менеджера
                <input type="text" name="password">
            </label>

            <input type="hidden" name="role" value="content">

            <button class="main-btn">Добавить</button>
        </form>
    </div>

@endsection
