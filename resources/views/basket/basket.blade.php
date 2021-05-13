@extends('layouts.app')

@section('title-block')
    Корзина
@endsection

<?php
$basketItems = [];
$basketID = isset($_COOKIE['basket_id']) ? $_COOKIE['basket_id'] : 0;
if ($basketID && !\Cart::session($basketID)->isEmpty())
    $basketItems = \Cart::session($basketID)->getContent();

?>

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Корзина
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        @if( count($basketItems) < 1 )
            <div class="big-text">
                В вашей корзине пока ничего нет
            </div>
            <a href="{{ route('main') }}">На главную</a>
        @else
            <div class="basket">
                <div class="basket__items">
                    @foreach($basketItems as $basketItem)
                        <div class="basket__item" data-id="{{ $basketItem->id }}">
                            <a href="{{ route('product', [ "id_category" => $basketItem->model->category, "id_product" => $basketItem->id]) }}"
                               class="basket__item__img">
                                <img src="/img/{{ $basketItem->attributes->img }}" alt="">
                            </a>
                            <a href="{{ route('product', [ "id_category" => $basketItem->model->category, "id_product" => $basketItem->id]) }}"
                               class="basket__item__title-wrapper">
                                <div class="basket__item__title">
                                    {{ $basketItem->name }}
                                </div>
                                <div class="basket__item__title_all">
                                    {{ $basketItem->name }}
                                </div>
                                <div class="basket__item__fabricator">
                                    Производитель: {{ $basketItem->attributes->fabricator }}
                                </div>
                            </a>

                            <div class="basket__item__count-btn">
                                <div class="product__count-btn flex">
                                    <div class="product__count-btn__remove circle-btn">
                                        <span class="material-icons">remove</span>
                                    </div>
                                    <input name="qty" type="number" value="{{ $basketItem->quantity }}" min="1"
                                           max="{{ $basketItem->attributes->numProduct }}">
                                    <div class="product__count-btn__add circle-btn">
                                        <span class="material-icons">add</span>
                                    </div>
                                </div>

                                <div class="basket__item__few-products">
                                    @if( ($basketItem->model->count - $basketItem->quantity) <= 5 )
                                        Осталось <span>{{ $basketItem->model->count - $basketItem->quantity }}</span>
                                        шт.
                                    @endif
                                </div>
                            </div>


                            <div>
                                <div class="basket__item__price_all">
                                    <span>{{ number_format($basketItem->price * $basketItem->quantity, 0, '.', ' ') }}</span>
                                    ₽
                                </div>
                                <div class="basket__item__price_one">
                                    <span>{{ number_format($basketItem->price, 0, '.', ' ') }}</span> ₽
                                </div>
                            </div>
                            <div class="basket__item__delete" data-id="{{ $basketItem->id }}">
                                <span class="material-icons">delete</span>
                            </div>

                        </div>
                    @endforeach
                    @csrf
                </div>
                <div class="basket__order">

                </div>
            </div>
        @endif
    </section>
@endsection
