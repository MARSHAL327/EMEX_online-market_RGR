@extends('layouts.app')

@section('title-block')
    Добавление товара
@endsection

@section('content')
    @php
        $routeName = Route::current()->getName();
    @endphp

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
                <li class=<?php if($routeName == "productCategory_add") echo "active" ?> >
                    <a href="{{ route('productCategory_add') }}">Категория</a>
                </li>
                <li class=<?php if($routeName == "property_add") echo "active" ?>>
                    <a href="{{ route('property_add') }}">Свойство</a>
                </li>
                <li class=<?php if($routeName == "fabricator_add") echo "active" ?>>
                    <a href="{{ route('fabricator_add') }}">Производитель</a>
                </li>
                <li class=<?php if($routeName == "provider_add") echo "active" ?>>
                    <a href="{{ route('provider_add') }}">Поставщик</a>
                </li>
                <li class=<?php if($routeName == "selectCategory" || $routeName == "product_add_view") echo "active" ?>>
                    <a href="{{ route('selectCategory') }}">Товар</a>
                </li>
            </ul>
        </div>
        <div class="tabs__item">
            @yield('addProductContent')
        </div>
    </div>

@endsection
