@extends('layouts.app')

@section('title-block')
    Добавление слайда
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Добавление слайда
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form" data-reload="false">
            @csrf
            <label for="img">
                Картинка
                <input type="file" name="img">
            </label>

            <label for="title">
                Название
                <input type="text" name="title">
            </label>

            <button class="main-btn">Добавить</button>
        </form>
    </div>

@endsection
