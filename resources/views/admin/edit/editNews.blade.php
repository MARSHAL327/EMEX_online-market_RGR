@extends('layouts.app')

@section('title-block')
    Редактирование новости
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование новости
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="date">
                Дата добавления новости
                <input type="date" name="date" value="{{ $news->date }}">
            </label>

            <label for="title">
                Название новости
                <input type="text" name="title" value="{{ $news->title }}">
            </label>

            <label for="img">
                Картинка новости
                <input type="file" name="img">
                <img class="edit-img" src="/img/{{ $news->img }}" alt="">
            </label>

            <label for="desc">
                Описание новости
                <textarea name="desc" id="news_desc" class="default-style CKEditor">
                    <?= htmlspecialchars_decode($news->desc) ?>
                </textarea>
            </label>

            <label for="text">
                Текст новости
                <textarea name="text" id="news_text" class="default-style CKEditor">
                    <?= htmlspecialchars_decode($news->text) ?>
                </textarea>
            </label>


            <button class="main-btn">Обновить</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#news_desc'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#news_text'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
