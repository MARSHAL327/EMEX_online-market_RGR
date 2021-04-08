@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="auto_modification">
            Выбор модификации авто
            <select name="auto_modification" id="">
            </select>
        </label>

        <label for="fabricator">
            Выбор производителя
            <select name="fabricator" id="">
            </select>
        </label>

        <label for="provider">
            Выбор поставщика
            <select name="provider" id="">
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

        <label for="category">
            Выбор категории
            <select name="category" id="">
            </select>
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
