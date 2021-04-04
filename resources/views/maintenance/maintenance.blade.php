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
        <div class="white-block">
            <div class="maintenance-title">
                <div class="maintenance-title__auto-data maintenance-title__item">
                    <div class="maintenance-title__auto-data__img">
                        <img src="<?= $_SERVER["HTTP_HOST"]; ?>/img/{{ $model->img }}" alt="">
                    </div>
                    <div class="maintenance-title__auto-data__text">
                        <div class="maintenance-title__auto-data__title">
                            {{ $brand->name }} {{ $model->name }}
                        </div>
                        <div class="maintenance-title__auto-data__modification">
                            Модификация - {{ $modification->name }}
                        </div>
                    </div>
                </div>
                <div class="maintenance-title__button maintenance-title__item">
                    <div class="transparent-btn">
                        <a href="{{ route('maintenance_brands') }}">Выбрать другой автомобиль</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-block white-block_grey-strip">
            <div class="modification__items">
                <table>
                    <tr class="grey-strip">
                        <th>Название детали</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                    </tr>
                    <tr class="auto-model__item">
                        <td>
                            Свеча зажигания
                        </td>
                        <td>
                            5 шт.
                        </td>
                        <td class="transparent-btn">
                            <a href="">Посмотреть цены</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection
