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
            <div class="news-card__item">
                <img src="img/image_2.png" alt="">
                <div class="news-card__text-btn-wrapper">
                    <div class="news-card__text-wrapper">
                        <div class="news-card__text-title">Новость</div>
                        <div class="news-card__text">Здесь идёт описание новости. Оно не очень большое</div>
                    </div>
                    <button class="news-btn">
                        Подробнее
                    </button>
                </div>
            </div>
            <div class="news-card__item">
                <img src="img/image_2.png" alt="">
                <div class="news-card__text-btn-wrapper">
                    <div class="news-card__text-wrapper">
                        <div class="news-card__text-title">Новость побольше</div>
                        <div class="news-card__text">Здесь идёт описание ещё одной новости. Оно чуть большое, для
                            демонстрации вместимости текста
                        </div>
                    </div>
                    <button class="news-btn">
                        Подробнее
                    </button>
                </div>
            </div>
            <div class="news-card__item">
                <img src="img/image_2.png" alt="">
                <div class="news-card__text-btn-wrapper">
                    <div class="news-card__text-wrapper">
                        <div class="news-card__text-title">Огромная новость</div>
                        <div class="news-card__text">Здесь идёт описание новости, которая поражает своими размерами.
                            Здесь текст не влезает, поэтому вам не видно, что происходит дальше за этими волшебными
                            тремя точками
                        </div>
                    </div>
                    <button class="news-btn">
                        Подробнее
                    </button>
                </div>
            </div>
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

        <div class="stock-card grid-3fr">
            <div class="stock-card__item">
                <img src="img/image_3.png" alt="">
                <span class="stock-card__text">Скидки на комплектующие BMW</span>
                <div class="black-bg"></div>
            </div>
            <div class="stock-card__item">
                <img src="img/image_3.png" alt="">
                <span class="stock-card__text">Скидки на комплектующие BMW</span>
                <div class="black-bg"></div>
            </div>
            <div class="stock-card__item">
                <img src="img/image_3.png" alt="">
                <span class="stock-card__text">Скидки на комплектующие BMW</span>
                <div class="black-bg"></div>
            </div>
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
