@extends('layouts.app')

@section('title-block')
    Запчасти для ТО
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Запчасти для ТО
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>
    </section>

    <section>
        <div class="maintenance-progress">
            <ul>
                <li class="maintenance-progress__item active">
                    <div class="maintenance-progress__item__circle">
                        <span class="material-icons">arrow_downward</span>
                    </div>
                    <div class="maintenance-progress__item__text">
                        Выберите марку
                    </div>
                    <div class="maintenance-progress__item__next-item">
                        <span class="material-icons">arrow_forward</span>
                    </div>
                </li>
                <li class="maintenance-progress__item">
                    <div class="maintenance-progress__item__circle"></div>
                    <div class="maintenance-progress__item__text">
                        Выберите модель
                    </div>
                    <div class="maintenance-progress__item__next-item">
                        <span class="material-icons">arrow_forward</span>
                    </div>
                </li>
                <li class="maintenance-progress__item">
                    <div class="maintenance-progress__item__circle"></div>
                    <div class="maintenance-progress__item__text">
                        Выберите модификацию
                    </div>
                </li>
            </ul>
        </div>
        <div class="white-block">
            <div class="auto-brand">
                <div class="auto-brand__item">
                    <div class="auto-brand__letter">
                        A
                    </div>
                    <ul class="auto-brand__brands">
                        <li><a href="">Audi</a></li>
                        <li><a href="">Acura</a></li>
                    </ul>
                </div>
                <div class="auto-brand__item">
                    <div class="auto-brand__letter">
                        B
                    </div>
                    <ul class="auto-brand__brands">
                        <li><a href="">BMW</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
