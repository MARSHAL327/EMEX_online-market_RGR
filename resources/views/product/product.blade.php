@extends('layouts.app')

@section('title-block')
    {{ $product->category->name }}
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                {{ $product->category->name }}
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="product">
            <div class="product__img">
                <img src="http://<?= $_SERVER["HTTP_HOST"] ?>/img/{{ $product->img }}" alt="">
            </div>
            <div class="product__info">
                <div class="product__text">
                    {{ $product->name }}
                </div>
                <div class="product__info-wrapper">
                    <div class="product__order">
                        <div class="product__count grey-text product__info-item">
                            Осталось {{ $product->count }} шт.
                        </div>
                        <div class="product__price blue-btn product__info-item">
                            Цена: {{ number_format($product->price, 0, '.', ' ') }} ₽
                        </div>
                        <div class="product__fabricator-provider product__info-item">
                            <div class="flex product__info-item">
                                <span class="material-icons">language</span>
                                Производитель: {{ $product->fabricator->name }}
                            </div>
                            <div class="flex product__info-item">
                                <span class="material-icons">local_shipping</span>
                                Поставщик: {{ $product->provider->name }}
                            </div>
                        </div>
                        <div class="product__btn main-btn main-btn_red">Добавить в корзину</div>
                    </div>
                    <div class="thin-frame">
                        <div class="blue-text bold-text fz-22">Краткие характеристики:</div>
                        <div class="product__properties">
                            @foreach($product->properties as $propertyItem)
                                <div class="product__property">
                                    <div class="product__property-name bold-text">{{ $propertyItem->properties->name }}</div>
                                    <div class="product__property-value">{{ $propertyItem->value }}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="blue-text">Подробнее</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
