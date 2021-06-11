@extends('layouts.app')

@section('title-block')
    @lang('about-company.page_name')
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                @lang('about-company.page_name')
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="about-company height-text">
            {!! $siteData->description !!}
        </div>

        <section class="about-company__statistic">
            <div class="black-bg"></div>
            <img src="/img/image_4.png" alt="">
            <div class="about-company__statistic__items grid-3fr">
                <div class="about-company__statistic__item">
                    <div class="about-company__statistic__item__title">
                        47
                    </div>
                    <div class="about-company__statistic__item__text">
                        млн. запчастей
                    </div>
                </div>
                <div class="about-company__statistic__item">
                    <div class="about-company__statistic__item__title">
                        50
                    </div>
                    <div class="about-company__statistic__item__text">
                        тыс. деталей в день
                    </div>
                </div>
                <div class="about-company__statistic__item">
                    <div class="about-company__statistic__item__title">
                        70
                    </div>
                    <div class="about-company__statistic__item__text">
                        тыс. посетителей ежедневно
                    </div>
                </div>
            </div>

        </section>

        <section>
            <div class="section-title">
            <span class="section-title__text">
                Наши принципы
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>
            <div class="about-company height-text">
                <p>
                    Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о
                    возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения
                    представителей
                    целевой аудитории является четким доказательством простого факта: перспективное планирование позволяет
                    оценить значение вывода текущих активов. Но постоянное информационно-пропагандистское обеспечение нашей
                    деятельности предполагает независимые способы реализации как самодостаточных, так и внешне зависимых
                    концептуальных решений.
                </p>
            </div>
        </section>

    </section>


@endsection
