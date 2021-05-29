@extends('layouts.app')

@section('title-block')
    Редактирование акции
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование акции
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form" data-reload="false">
            @csrf
            <input type="hidden" name="old_image" value="{{ $stock->img }}">

            <label for="title">
                Название акции
                <input type="text" name="title" value="{{ $stock->title }}">
            </label>

            <label for="img">
                Картинка акции
                <input type="file" name="img">
                <img class="edit-img" src="/img/{{ $stock->img }}" alt="">
            </label>

            <label for="desc">
                Описание акции
                <textarea name="desc" id="stock_desc" class="default-style CKEditor">
                    <?= htmlspecialchars_decode($stock->desc) ?>
                </textarea>
            </label>

            <label for="date_start">
                Дата начала акции
                <input type="date" name="date_start" value="{{ $stock->date_start }}">
            </label>

            <label for="date_end">
                Дата конца акции
                <input type="date" name="date_end" value="{{ $stock->date_end }}">
            </label>

            <button class="main-btn">Обновить</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#stock_desc'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
