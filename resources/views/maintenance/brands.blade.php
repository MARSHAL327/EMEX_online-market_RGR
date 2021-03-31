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
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">arrow_downward</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            Выберите марку
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item">
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle"></div>
                        <div class="maintenance-progress__item__text">
                            Выберите модель
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item">
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle"></div>
                        <div class="maintenance-progress__item__text">
                            Выберите модификацию
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="white-block">
            <div class="auto-brand">
                @foreach($brandsFirstLetter as $firstLetter)
                    <div class="auto-brand__item">
                        <div class="auto-brand__letter">
                            {{ $firstLetter->first_letter }}
                        </div>
                        <ul class="auto-brand__brands">
                            @foreach($brandsData as $brand)
                                @if( substr($brand->name, 0, 1) == $firstLetter->first_letter )
                                    <li><a href="{{ route('maintenance_models', $brand->id) }}">{{ $brand->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
