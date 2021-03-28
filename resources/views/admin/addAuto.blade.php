@extends('layouts.app')

@section('title-block')
Добавление авто
@endsection

@section('content')
<div class="white-block">
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Добавление авто
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>
    </section>

    <div class="main-tabs">
        <ul>
            <li class="active">Бренд</li>
            <li>Модель</li>
            <li>Модификация</li>
        </ul>
    </div>
    <div class="tabs__item">
        <form action="" method="post" class="main-form">
            @csrf
            <label for="name">
                Название бренда
                <input type="text" name="name">
            </label>

            <button class="main-btn">Добавить</button>
        </form>
    </div>
</div>

@endsection
