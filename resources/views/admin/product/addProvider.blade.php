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
            <textarea name="desc" id="provider_desc"></textarea>
        </label>

        <button class="main-btn">Добавить</button>
    </form>

    <script>
        ClassicEditor
            .create( document.querySelector( '#provider_desc' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
