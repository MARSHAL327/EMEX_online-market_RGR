@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="category_id">
            Выбор категории товара

            <select name="category_id" id="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>

        <label for="name">
            Название свойства
            <input type="text" name="name">
        </label>

        <label for="prop_type_id">
            Выбор типа свойства

            <select name="prop_type_id" id="">
                @foreach($propType as $propTypeItem)
                    <option value="{{ $propTypeItem->id }}">{{ $propTypeItem->type }}</option>
                @endforeach
            </select>
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
