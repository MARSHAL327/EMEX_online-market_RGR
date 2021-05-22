@extends('layouts.app')

@section('title-block')
    Архив новостей
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                Архив новостей
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="news-card grid-3fr">
            @foreach($news as $newsItem)
                <div class="news-card__item">
                    <img src="/img/{{ $newsItem->img }}" alt="">
                    <div class="news-card__text-btn-wrapper">
                        <div class="news-card__text-wrapper">
                            <div class="news-card__text-title">{{ $newsItem->title }}</div>
                            <div class="news-card__text"><?= htmlspecialchars_decode($newsItem->desc) ?></div>
                        </div>
                        <a href="{{ route('news_one', $newsItem->id) }}">
                            <button class="news-btn">
                                Подробнее
                            </button>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

        {{ $news->links('paginate') }}
    </section>


@endsection
