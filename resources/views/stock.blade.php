@extends('layouts.app')

@section('title-block')
    @lang('stock.page_name')
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                @lang('stock.page_name')
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>

        <div class="stock-card grid-4fr">
            @foreach($stock as $stockItem)
                <div class="card stock-card__item">
                    <div class="card-back edit">
                        @if( $user )
                            <a href="{{ route('stock.edit', $stockItem->id) }}" class="edit__btn">
                                <span class="material-icons">edit</span>
                            </a>
                        @endif

                        <span class="stock-card__desc default-style">
                            <?= htmlspecialchars_decode($stockItem->desc) ?>
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
                        <img src="/img/{{ $stockItem->img }}" alt="">
                        <span class="stock-card__text">{{ $stockItem->title }}</span>
                        <div class="black-bg"></div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $stock->links('paginate') }}
    </section>


@endsection
