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
                <li class=<?php if(Route::current()->getName() == "brand_add") echo "active" ?> >
                    <a href="{{ route('brand_add') }}">Бренд</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "model_add") echo "active" ?>>
                    <a href="{{ route('model_add') }}">Модель</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "modification_add") echo "active" ?>>
                    <a href="{{ route('modification_add') }}">Модификация</a>
                </li>
            </ul>
        </div>
        <div class="tabs__item">
            @yield('addAutoContent')
        </div>
    </div>

@endsection
