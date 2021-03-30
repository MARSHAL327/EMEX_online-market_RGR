@extends('layouts.addAutoLayout')

@section('addAutoContent')
    <form action="" method="post" class="main-form">
        @csrf
        <label for="name">
            Название бренда
            <input type="text" name="name">
        </label>

        <button class="main-btn">Добавить</button>
    </form>
@endsection
