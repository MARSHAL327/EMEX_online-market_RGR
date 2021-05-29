@extends('layouts.app')

@section('title-block')
    Редактирование слайдера
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Редактирование слайдера
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
        </section>

        <form action="" method="post" class="main-form" data-reload="false">
            @csrf
            <div class="slider-grid">
                @foreach($slides as $slide)
                    <div class="slider-grid__item">
                        <div class="slider-grid__img">
                            <a href="{{ route("slide.edit", $slide->id) }}" class="slider-grid__change-img">
                                <span>Изменить</span>
                                <div class="slider-grid__delete-item" data-id="{{ $slide->id }}">
                                    <span class="material-icons">delete</span>
                                </div>
                            </a>
                            <img src="img/{{ $slide->img }}" alt="">
                        </div>
                        <div class="slider-grid__title">
                            {{ $slide->title }}
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('slide.add') }}" class="slider-grid__add-slide">
                    <span>
                        Добавить слайд
                    </span>
                </a>
            </div>
        </form>
    </div>

@endsection
