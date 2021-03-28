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
                            Audi
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item maintenance-progress__item_checked">
                    <a href="{{ route('maintenance_models') }}">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">done</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            Audi A1
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item active">
                    <a href="">
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
                <table>
                    <tr class="grey-strip">
                        <th>Модификация</th>
                        <th>Тип двигателя</th>
                        <th>Модель двигателя</th>
                        <th>Объем двигателя (л)</th>
                        <th>Мощность</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1.2 TFSI</td>
                        <td>Бензиновый</td>
                        <td>CBZA</td>
                        <td>1.2</td>
                        <td>86</td>
                        <td class="transparent-btn">
                            <a href="">Выбрать</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1.2 TFSI</td>
                        <td>Бензиновый</td>
                        <td>CBZA</td>
                        <td>1.2</td>
                        <td>86</td>
                        <td class="transparent-btn">
                            <a href="">Выбрать</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection
