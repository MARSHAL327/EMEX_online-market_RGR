@extends('layouts.app')

@section('title-block')
    Редактирование слайда
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование слайда
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form" data-reload="false">
            @csrf
            <input type="hidden" name="id" value="{{ $slide->id }}">
            <input type="hidden" name="old_image" value="{{ $slide->img }}">

            <label for="img">
                Картинка
                <input type="file" name="img">
                <img class="edit-img" src="/img/{{ $slide->img }}" alt="">
            </label>

            <label for="title">
                Название
                <input type="text" name="title" value="{{ $slide->title }}">
            </label>

            <button class="main-btn">Обновить</button>
        </form>
    </div>

@endsection
