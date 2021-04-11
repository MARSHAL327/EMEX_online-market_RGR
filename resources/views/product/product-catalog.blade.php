@extends('layouts.app')

@section('title-block')
    {{ $productData->category->name }}
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                {{ $productData->category->name }}
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="product-catalog-wrapper">
            <div class="filter">
                <div class="filter__item">
                    <div class="filter__item__title">
                        Производитель
                        <span class="material-icons">expand_less</span>
                    </div>
                    <div class="filter__item__content">
                        @foreach($fabricatorNames as $fabricatorName)
                            <label for="{{ $fabricatorName }}">
                                <input type="checkbox" name="{{ $fabricatorName }}">{{ $fabricatorName }}
                            </label>
                        @endforeach
                    </div>
                </div>
                @foreach($productProperties as $propertyItem)
                    <div class="filter__item">
                        <div class="filter__item__title">
                            {{ $propertyItem->properties->name }}
                            <span class="material-icons">expand_less</span>
                        </div>
                        <div class="filter__item__content">
                            <label for="{{ $propertyItem->value }}">
                                <input type="checkbox" name="{{ $propertyItem->value }}">{{ $propertyItem->value }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="product-card">
                @foreach($listProduct as $product)
                    <a href="{{ route('product', [ "id_category" => $productData->category->id, "id_product" => $product->id]) }}" class="product-card__item">
                        <div class="product-card__img">
                            <img src="http://<?= $_SERVER["HTTP_HOST"] ?>/img/{{ $product->img }}" alt="">
                        </div>
                        <div class="product-card__price">
                            {{ number_format($product->price, 0, '.', ' ') }} ₽
                        </div>
                        <div class="product-card__name">
                            {{ $product->name }}
                        </div>
                        <div class="product-card__properties">
                            @foreach($product->properties as $propertyItem)
                                <div class="product-cards__properties-item">
                                    {{ $propertyItem->properties->name }}: {{ $propertyItem->value }}
                                </div>
                            @endforeach
                        </div>
                        <div class="main-btn main-btn_red">
                            Подробнее
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </section>


@endsection
