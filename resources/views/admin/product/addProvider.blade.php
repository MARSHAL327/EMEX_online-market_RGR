@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="name">
            Название поставщика
            <input type="text" name="name">
        </label>

        <label for="logo">
            Лого поставщика
            <input type="file" name="logo">
        </label>

        <label for="desc">
            Описание поставщика
            <textarea name="desc"></textarea>
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
