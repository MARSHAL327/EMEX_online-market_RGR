@extends('layouts.app')

@section('title-block')
    Редактирование данных организации
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование данных организации
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form">
            @csrf
            <label for="name">
                Название
                <input type="text" name="name" value="{{ $siteData->name }}">
            </label>

            <label for="address">
                Адрес организации
                <input type="text" name="address" value="{{ $siteData->address }}">
            </label>

            <label for="work_time">
                Рабочее время
                <input type="text" name="work_time" value="{{ $siteData->work_time }}">
            </label>

            <label for="phone">
                Телефон
                <input type="text" name="phone" value="{{ $siteData->phone }}">
            </label>

            <label for="email">
                Email
                <input type="text" name="email" value="{{ $siteData->email }}">
            </label>

            <label for="description">
                Описание
                <textarea name="description" id="site_desc" class="default-style CKEditor">
                    {{ $siteData->description }}
                </textarea>
            </label>


            <button class="main-btn">Обновить</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#site_desc'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
