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
                <li class="maintenance-progress__item maintenance-progress__item_checked">
                    <a href="{{ route('maintenance_brands') }}">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">done</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            {{ $brandName }}
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item active">
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">arrow_downward</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            Выберите модель
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item">
                    <a href="">
                        <div class="maintenance-progress__item__circle"></div>
                        <div class="maintenance-progress__item__text">
                            Выберите модификацию
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="white-block">
            <div class="auto-model">
                <ul>
                    <li class="auto-model__item"><a href="{{ route('maintenance_modification') }}">A1</a></li>
                    <li class="auto-model__item"><a href="">A2</a></li>
                    <li class="auto-model__item"><a href="">A3</a></li>
                    <li class="auto-model__item"><a href="">A4</a></li>
                    <li class="auto-model__item"><a href="">A5</a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
