@extends('layouts.app')

@section('title-block')
    Добавление новости
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Добавление новости
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="title">
                Название новости
                <input type="text" name="title">
            </label>

            <label for="img">
                Картинка новости
                <input type="file" name="img">
            </label>

            <label for="desc">
                Описание новости
                <textarea name="desc"></textarea>
            </label>

            <label for="text">
                Текст новости
                <textarea name="text"></textarea>
            </label>

            <button class="main-btn">Добавить</button>
        </form>
    </div>

@endsection
