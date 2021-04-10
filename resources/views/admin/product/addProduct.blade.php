@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="{{ route('product_add') }}" method="post" class="main-form">
        @csrf
        <label for="auto_modification">
            Выбор модификации авто
            <select name="auto_modification">
                @foreach($autoModifications as $autoModification)
                    <option value="{{ $autoModification->id }}">{{ $autoModification->autoModel->brand->name }} {{ $autoModification->autoModel->name }} ({{ $autoModification->name }})</option>
                @endforeach
            </select>
        </label>

        <label for="fabricator">
            Выбор производителя
            <select name="fabricator">
                @foreach($productFabricators as $productFabricator)
                    <option value="{{ $productFabricator->id }}">{{ $productFabricator->name }}</option>
                @endforeach
            </select>
        </label>

        <label for="provider">
            Выбор поставщика
            <select name="provider">
                @foreach($productProviders as $productProvider)
                    <option value="{{ $productProvider->id }}">{{ $productProvider->name }}</option>
                @endforeach
            </select>
        </label>

        <label for="name">
            Название запчасти
            <input type="text" name="name">
        </label>

        <label for="count">
            Доступное количество
            <input type="text" name="count">
        </label>

        <label for="img">
            Картинка запчасти
            <input type="file" name="img">
        </label>

        <label for="price">
            Цена
            <input type="text" name="price">
        </label>

        <label for="price">
            Наличие
            <input type="text" name="price">
        </label>

        @foreach($productProperties as $productProperty)
            <label for="property_{{ $productProperty->id }}">
                {{ $productProperty->name }}
                <input type="text" name="property_{{ $productProperty->id }}">
            </label>
        @endforeach

        <button class="main-btn">Добавить</button>
    </form>
@endsection
