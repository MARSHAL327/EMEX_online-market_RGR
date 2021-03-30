@extends('layouts.app')

@section('title-block')
    Главная страница
@endsection

@section('content')
    <div class="main-slider-wrapper">
        <div class="main-slider">
            <div class="main-slider__item">
                <img src="img/image_1.png" alt="">
                <span>Слайд 1</span>
                <div class="black-bg"></div>
            </div>
            <div class="main-slider__item">
                <img src="img/image_1.png" alt="">
                <span>Слайд 2</span>
                <div class="black-bg"></div>
            </div>
            <div class="main-slider__item">
                <img src="img/image_1.png" alt="">
                <span>Слайд 3</span>
                <div class="black-bg"></div>
            </div>
        </div>

        <div class="main-slider__prev-item">
            <span class="material-icons">arrow_back_ios</span>
        </div>
        <div class="main-slider__next-item">
            <span class="material-icons">arrow_forward_ios</span>
        </div>
    </div>

    <section>
        <div class="section-title">
            <span class="section-title__text">
                Бренды автомобилей
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>
        <div class="auto-brand">
            @foreach($brandsFirstLetter as $firstLetter)
                <div class="auto-brand__item">
                    <div class="auto-brand__letter">
                        {{ $firstLetter->first_letter }}
                    </div>
                    <ul class="auto-brand__brands">
                        @foreach($brandsData as $brand)
                            @if( substr($brand->name, 0, 1) == $firstLetter->first_letter )
                                <li><a href="{{ route('maintenance_models', $brand->id) }}">{{ $brand->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="section-title">
            <span class="section-title__text">
                Новости
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more">
                <a href="{{ route('news_all')  }}">Посмотреть все новости</a>
            </div>
        </div>

        <div class="news-card grid-3fr">
            @foreach($news as $newsItem)
                <div class="news-card__item">
                    <img src="<?= $_SERVER["HTTP_HOST"]; ?>/{{ $newsItem->img }}" alt="">
                    <div class="news-card__text-btn-wrapper">
                        <div class="news-card__text-wrapper">
                            <div class="news-card__text-title">{{ $newsItem->title }}</div>
                            <div class="news-card__text">{{ $newsItem->desc }}</div>
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
    </section>

    <section>
        <div class="section-title">
            <span class="section-title__text">
                Акции
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more">
                <a href="{{ route('stock_all')  }}">Посмотреть все акции</a>
            </div>
        </div>

        <div class="stock-card grid-4fr">
            @foreach($stock as $stockItem)
                <div class="card stock-card__item">
                    <div class="card-back">
                        <span class="stock-card__desc">
                            {{ $stockItem->desc }}
                            <div class="stock-card__date">
                                Начало акции:
                                <span>{{ date('d.m.Y', strtotime($stockItem->date_start)) }}</span>
                            </div>
                            <div class="stock-card__date">
                                Конец акции:
                                <span>{{ date('d.m.Y', strtotime($stockItem->date_end)) }}</span>
                            </div>
                        </span>
                    </div>
                    <div class="card-front">
                        <img src="<?= $_SERVER["HTTP_HOST"]; ?>/{{ $stockItem->img }}" alt="">
                        <span class="stock-card__text">{{ $stockItem->title }}</span>
                        <div class="black-bg"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="section-title">
            <span class="section-title__text">
                О Компании
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more">
                <a href="{{ route('about-company')  }}">Подробнее</a>
            </div>
        </div>

        <div class="about-company height-text">
            <p>
                Предварительные выводы неутешительны: укрепление и развитие внутренней структуры влечет за собой процесс
                внедрения и модернизации системы массового участия. Идейные соображения высшего порядка, а также
                глубокий уровень погружения требует определения и уточнения системы массового участия. Банальные, но
                неопровержимые выводы, а также независимые государства, превозмогая сложившуюся непростую экономическую
                ситуацию, своевременно верифицированы.
            </p>
            <br><br>
            <p>
                Равным образом, дальнейшее развитие различных форм деятельности создаёт необходимость включения в
                производственный план целого ряда внеочередных мероприятий с учётом комплекса вывода текущих активов.
                Есть над чем задуматься: интерактивные прототипы освещают чрезвычайно интересные особенности картины в
                целом, однако конкретные выводы, разумеется, описаны максимально подробно. В частности, понимание сути
                ресурсосберегающих технологий однозначно фиксирует необходимость распределения внутренних резервов и
                ресурсов.
            </p>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $('.main-slider').slick({
                prevArrow: $(".main-slider~.main-slider__prev-item"),
                nextArrow: $(".main-slider~.main-slider__next-item"),
            });
        });
    </script>
@endsection
