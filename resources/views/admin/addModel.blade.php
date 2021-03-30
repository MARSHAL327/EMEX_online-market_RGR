@extends('layouts.addAutoLayout')

@section('addAutoContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="name">
            Выбор бренда
            <select name="brand_id" id="">
                @foreach($brandsData as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </label>

        <label for="model_name">
            Название модели
            <input type="text" name="model_name">
        </label>

        <label for="img">
            Картинка модели
            <input type="file" name="img">
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
