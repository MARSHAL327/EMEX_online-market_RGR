@extends('layouts.app')

@section('title-block')
    О Нас
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                О Компании
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="about-company height-text">
            <p>
                Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о
                возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения
                представителей целевой аудитории является четким доказательством простого факта: перспективное
                планирование позволяет оценить значение вывода текущих активов. Но постоянное
                информационно-пропагандистское обеспечение нашей деятельности предполагает независимые способы
                реализации как самодостаточных, так и внешне зависимых концептуальных решений.
            </p>
            <br><br>
            <p>
                А также акционеры крупнейших компаний являются только методом политического участия и указаны как
                претенденты на роль ключевых факторов. Сплочённость команды профессионалов позволяет выполнить важные
                задания по разработке новых принципов формирования материально-технической и кадровой базы. Задача
                организации, в особенности же курс на социально-ориентированный национальный проект играет определяющее
                значение для экономической целесообразности принимаемых решений.
            </p>
        </div>

        <section class="about-company__statistic">
            <div class="black-bg"></div>
            <img src="<?= $_SERVER["HTTP_HOST"]; ?>/img/image_4.png" alt="">
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
