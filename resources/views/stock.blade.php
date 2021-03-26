@extends('layouts.app')

@section('title-block')
    Акции
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Акции
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="stock-card grid-3fr">
            @foreach($stock as $stockItem)
                <div class="stock-card__item">
                    <img src="<?= $_SERVER["HTTP_HOST"]; ?>/{{ $stockItem->img }}" alt="">
                    <span class="stock-card__text">{{ $stockItem->title }}</span>
                    <div class="black-bg"></div>
                </div>
            @endforeach
        </div>

        {{ $stock->links('paginate') }}
    </section>


@endsection
