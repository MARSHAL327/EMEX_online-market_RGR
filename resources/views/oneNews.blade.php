@extends('layouts.app')

@section('title-block')
    {{ $oneNews->title }}
@endsection

@section('content')
    <div class="main-slider-wrapper one-news">
        <div class="main-slider">
            <div class="main-slider__item">
                <img src="/img/{{$oneNews->img }}" alt="">
                <div class="one-news__title">{{ $oneNews->title }}</div>
                <div class="one-news__desc"><?= htmlspecialchars_decode($oneNews->desc) ?></div>
                <div class="one-news__date">Дата добавления: {{ date('d.m.Y', strtotime($oneNews->date)) }}</div>
                <div class="black-bg"></div>
            </div>
        </div>
    </div>

    <section class="grey-block">
        <div class="height-text default-style">
            <?= htmlspecialchars_decode($oneNews->text) ?>
        </div>
    </section>
@endsection
