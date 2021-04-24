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
                @csrf
                <div class="filter__item active">
                    <div class="filter__item__title filter__title_text">
                        <span class="filter__item__title_name">Производитель</span>
                        <span class="material-icons">expand_less</span>
                    </div>
                    <div class="filter__item__content">
                        @foreach($fabricatorNames as $fabricatorName)
                            <label for="Производитель">
                                <input class="filter__input_text filter__input" type="checkbox" value="{{ $fabricatorName }}"
                                       name="Производитель">{{ $fabricatorName }}
                            </label>
                        @endforeach
                    </div>
                </div>
                @foreach($props as $prop)
                    <div class="filter__item active">
                        <div class="filter__item__title <?= $prop[0]->properties->type == 1 ? "filter__title_number" : "filter__title_text" ?>">
                            <span class="filter__item__title_name">{{ $prop[0]->properties->name }}</span>
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
                                @php
                                    $propType = $propValue->properties->propType->type;
                                @endphp
                                @if( $propType == "Число" )
                                    <div class="filter__item_number">
                                        <label for="{{ $prop[0]->properties->name }}">
                                            <input class="filter__input_number filter__input"
                                                   type="text"
                                                   data-extremum="min"
                                                   min="{{ $min }}"
                                                   max="{{ $max }}"
                                                   name="{{ $prop[0]->properties->name }}"
                                                   placeholder="от {{ $min }}">
                                        </label>
                                        <span class="dash">—</span>
                                        <label for="{{ $prop[0]->properties->name }}">
                                            <input class="filter__input"
                                                   type="text"
                                                   data-extremum="max"
                                                   min="{{ $min }}"
                                                   max="{{ $max }}"
                                                   name="{{ $prop[0]->properties->name }}"
                                                   placeholder="до {{ $max }}">
                                        </label>
                                    </div>
                                    @break
                                @elseif( $propType == "Текст" )
                                    <label for="{{ $prop[0]->properties->name }}">
                                        <input class="filter__input_text filter__input" value="{{ $propValue->value }}" type="checkbox"
                                               name="{{ $prop[0]->properties->name }}">{{ $propValue->value }}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            @include('product.product-catalog-card')

        </div>

    </section>


@endsection
