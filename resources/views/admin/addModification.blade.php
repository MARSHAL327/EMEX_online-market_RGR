@extends('layouts.addAutoLayout')

@section('addAutoContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="model_id">
            Выбор модели
            <select name="model_id">
                @foreach($autoModelData as $autoModel)
                    <option value="{{ $autoModel->id }}">{{ $autoModel->brand->name }} {{ $autoModel->name }}</option>
                @endforeach
            </select>
        </label>

        <label for="modification_name">
            Название модификации
            <input type="text" name="modification_name">
        </label>

        <label for="engine_type">
            Тип двигателя
            <input type="text" name="engine_type">
        </label>

        <label for="engine_model">
            Модель двигателя
            <input type="text" name="engine_model">
        </label>

        <label for="engine_volume">
            Объём двигателя
            <input type="text" name="engine_volume">
        </label>

        <label for="power">
            Мощность
            <input type="text" name="power">
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
