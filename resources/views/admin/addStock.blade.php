@extends('layouts.app')

@section('title-block')
    Добавление акции
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Добавление акции
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="title">
                Название акции
                <input type="text" name="title">
            </label>

            <label for="img">
                Картинка акции
                <input type="file" name="img">
            </label>

            <label for="desc">
                Описание акции
                <textarea name="desc"></textarea>
            </label>

            <label for="date_start">
                Дата начала акции
                <input type="date" name="date_start">
            </label>

            <label for="date_end">
                Дата конца акции
                <input type="date" name="date_end">
            </label>

            <button class="main-btn">Добавить</button>
        </form>
    </div>

@endsection
