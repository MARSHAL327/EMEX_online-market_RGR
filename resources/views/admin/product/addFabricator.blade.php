@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="name">
            Название производителя
            <input type="text" name="name">
        </label>

        <label for="logo">
            Лого производителя
            <input type="file" name="logo">
        </label>

        <label for="desc">
            Описание производителя
            <textarea name="desc"></textarea>
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
