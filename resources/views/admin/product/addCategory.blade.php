@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="name">
            Название категории товара
            <input type="text" name="name">
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
