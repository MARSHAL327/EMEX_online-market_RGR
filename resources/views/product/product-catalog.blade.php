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
                <div class="filter__item active">
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
                @foreach($props as $prop)
                        <div class="filter__item active">
                            <div class="filter__item__title">
                                {{ $prop[0]->properties->name }}
                                <span class="material-icons">expand_less</span>
                            </div>
                            <div class="filter__item__content">
                                @php
                                    $min = $prop[0]->value;
                                    $max = 0;

                                    foreach ($prop as $propItem) {
                                        if( $propItem->value > $max ) $max = $propItem->value;
                                        if( $propItem->value < $min ) $min = $propItem->value;
                                    }
                                @endphp
                                @foreach( $prop as $propValue)
                                    @php $propType = $propValue->properties->propType->type @endphp
                                    @if( $propType == "Число" )
                                        <div class="filter__item_number">
                                            <label for="min_value">
                                                <input type="text" name="min_value" placeholder="от {{ $min }}">
                                            </label>
                                            <span class="dash">—</span>
                                            <label for="max_value">
                                                <input type="text" name="max_value" placeholder="до {{ $max }}">
                                            </label>
                                        </div>
                                        @break
                                    @elseif( $propType == "Текст" )
                                        <label for="{{ $propValue->value }}">
                                            <input type="checkbox" name="{{ $propValue->value }}">{{ $propValue->value }}
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    {{--                    <div class="filter__item">--}}
                    {{--                        <div class="filter__item__title">--}}
                    {{--                            {{ $prop->properties->name }}--}}
                    {{--                            <span class="material-icons">expand_less</span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="filter__item__content">--}}
                    {{--                            @foreach( $prop as $propValue)--}}

                    {{--                            @endforeach--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                @endforeach
            </div>
            <div class="product-card">
                @foreach($listProduct as $product)
                    <a href="{{ route('product', [ "id_category" => $productData->category->id, "id_product" => $product->id]) }}"
                       class="product-card__item">
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
