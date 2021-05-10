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
                <img src="/img/{{ $product->img }}" alt="">
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
                        <form class="flex product-form" action="{{ route("basketAddItems") }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="product__count-btn flex">
                                <div class="product__count-btn__remove circle-btn">
                                    <span class="material-icons">remove</span>
                                </div>
                                <input name="qty" type="number" value="1" min="1" max="{{ $product->count }}">
                                <div class="product__count-btn__add circle-btn">
                                    <span class="material-icons">add</span>
                                </div>
                            </div>
                            <button type="submit" class="product__btn main-btn main-btn_red">Добавить в корзину</button>
                        </form>
                    </div>
                    <div class="thin-frame">
                        <div class="blue-text bold-text fz-22">Краткие характеристики:</div>
                        <div class="product__properties mt-20 mb-20">
                            @foreach($product->properties as $propertyItem)
                                <div class="product__property">
                                    <div
                                        class="product__property-name bold-text">{{ $propertyItem->properties->name }}</div>
                                    <div class="product__property-value">{{ $propertyItem->value }}</div>
                                </div>
                            @endforeach
                        </div>
                        <a href="#props" class="blue-text">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="main-tabs">
            <ul style="grid-template-columns: repeat(5, 150px)">
                <li class="active" id="props">
                    <a href="javascript:void(0)">Харакетристики</a>
                </li>
                <li class=>
                    <a href="javascript:void(0)">Производитель</a>
                </li>
                <li class=>
                    <a href="javascript:void(0)">Поставщик</a>
                </li>
            </ul>
            <div>
                <div class="product__properties mt-20">
                    @foreach($product->properties as $propertyItem)
                        <div class="product__property">
                            <div class="product__property-name bold-text">{{ $propertyItem->properties->name }}</div>
                            <div class="product__property-value">{{ $propertyItem->value }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="description-block mt-20">
                    <div class="description-block__img">
                        <img src="/img/{{ $product->fabricator->logo }}" alt="">
                    </div>
                    <div class="description-block__content-wrapper">
                        <div class="description-block__title">
                            {{ $product->fabricator->name }}
                        </div>
                        <div class="description-block__text">
                            {{ $product->fabricator->description }}
                        </div>
                    </div>
                </div>
                <div class="description-block mt-20">
                    <div class="description-block__img">
                        <img src="/img/{{ $product->provider->logo }}" alt="">
                    </div>
                    <div class="description-block__content-wrapper">
                        <div class="description-block__title">
                            {{ $product->provider->name }}
                        </div>
                        <div class="description-block__text">
                            {{ $product->provider->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function () {
            $(".main-tabs").lightTabs();
        })
    </script>

@endsection
