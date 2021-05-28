@extends('layouts.app')

@section('title-block')
    Редактирование товара
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование товара
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="auto_modification">
                Выбор модификации авто
                <select name="auto_modification">
                    @foreach($autoModifications as $autoModification)
                        @if( $autoModification->id == $product->modification_id )
                            <option
                                selected
                                value="{{ $autoModification->id }}">{{ $autoModification->autoModel->brand->name }} {{ $autoModification->autoModel->name }}
                                ({{ $autoModification->name }})
                            </option>
                        @else
                            <option
                                value="{{ $autoModification->id }}">{{ $autoModification->autoModel->brand->name }} {{ $autoModification->autoModel->name }}
                                ({{ $autoModification->name }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </label>

            <label for="fabricator">
                Выбор производителя
                <select name="fabricator">
                    @foreach($productFabricators as $productFabricator)
                        @if( $productFabricator->id == $product->product_fabricator_id )
                            <option selected
                                    value="{{ $productFabricator->id }}">{{ $productFabricator->name }}</option>
                        @else
                            <option value="{{ $productFabricator->id }}">{{ $productFabricator->name }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            <label for="provider">
                Выбор поставщика
                <select name="provider">
                    @foreach($productProviders as $productProvider)
                        @if( $productProvider->id == $product->product_provider_id )
                            <option selected value="{{ $productProvider->id }}">{{ $productProvider->name }}</option>
                        @else
                            <option value="{{ $productProvider->id }}">{{ $productProvider->name }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            <label for="name">
                Название товара
                <input type="text" name="name" value="{{ $product->name }}">
            </label>

            <label for="count">
                Доступное количество
                <input type="text" name="count" value="{{ $product->count }}">
            </label>

            <label for="edit_img">
                Картинка товара
                <input type="file" name="edit_img">
                <img class="edit-img" src="/img/{{ $product->img }}" alt="">
            </label>

            <label for="price">
                Цена товара
                <input type="text" name="price" value="{{ $product->price }}">
            </label>

            @foreach($productPropertiesValue as $productPropertyValue)
                <label for="properties[{{ $productPropertyValue->properties->id }}]">
                    {{ $productPropertyValue->properties->name }}
                    <input type="text" name="properties[{{ $productPropertyValue->properties->id }}]"
                           value="{{ $productPropertyValue->value }}">
                </label>
            @endforeach

            <button class="main-btn">Обновить</button>
        </form>
    </div>

@endsection

