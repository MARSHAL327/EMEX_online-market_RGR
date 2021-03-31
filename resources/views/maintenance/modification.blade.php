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
                            {{ $autoData->autoModel->Brand->name }}
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item maintenance-progress__item_checked">
                    <a href="{{ route('maintenance_models', $autoData->autoModel->Brand->id) }}">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">done</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            {{ $autoData->autoModel->name }}
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
                            Выберите модификацию
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="white-block white-block_grey-strip">
            <div class="modification__items">
                @if( count($modifications) < 1 )
                    Для данной модели не найдено модификаций
                @else
                @endif
                <table>
                    <tr class="grey-strip">
                        <th>Модификация</th>
                        <th>Тип двигателя</th>
                        <th>Модель двигателя</th>
                        <th>Объем двигателя (л)</th>
                        <th>Мощность</th>
                        <th></th>
                    </tr>
                    @foreach($modifications as $modification)
                        <tr class="auto-model__item">
                            <td>
                                {{ $modification->name }}
                            </td>
                            <td>
                                {{ $modification->engine_type }}
                            </td>
                            <td>
                                {{ $modification->engine_model }}
                            </td>
                            <td>
                                {{ $modification->engine_volume }}
                            </td>
                            <td>
                                {{ $modification->power }}
                            </td>
                            <td class="transparent-btn">
                                <a href="">Выбрать</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
