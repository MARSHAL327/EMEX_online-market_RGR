@extends('layouts.app')

@section('title-block')
    Добавление товара
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Добавление товара
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <div class="main-tabs">
            <ul style="grid-template-columns: repeat(5, 150px)">
                <li class=<?php if(Route::current()->getName() == "productCategory_add") echo "active" ?> >
                    <a href="{{ route('productCategory_add') }}">Категория</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "property_add") echo "active" ?>>
                    <a href="{{ route('property_add') }}">Свойство</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "fabricator_add") echo "active" ?>>
                    <a href="{{ route('fabricator_add') }}">Производитель</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "provider_add") echo "active" ?>>
                    <a href="{{ route('provider_add') }}">Поставщик</a>
                </li>
                <li class=<?php if(Route::current()->getName() == "product_add") echo "active" ?>>
                    <a href="{{ route('product_add') }}">Товар</a>
                </li>
            </ul>
        </div>
        <div class="tabs__item">
            @yield('addProductContent')
        </div>
    </div>

@endsection
