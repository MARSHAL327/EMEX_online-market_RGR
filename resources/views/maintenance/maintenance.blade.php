@extends('layouts.app')

@section('title-block')
    @lang('maintenance.spare_parts_for_maintenance')
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                @lang('maintenance.spare_parts_for_maintenance')
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>
    </section>

    <section>
        <div class="white-block">
            <div class="maintenance-title">
                <div class="maintenance-title__auto-data maintenance-title__item">
                    <div class="maintenance-title__auto-data__img">
                        <img src="<?= $_SERVER["HTTP_HOST"]; ?>/img/{{ $autoData->autoModel->img }}" alt="">
                    </div>
                    <div class="maintenance-title__auto-data__text">
                        <div class="maintenance-title__auto-data__title">
                            {{ $autoData->autoModel->brand->name }} {{ $autoData->autoModel->name }}
                        </div>
                        <div class="maintenance-title__auto-data__modification">
                            @lang('maintenance.modification') - {{ $autoData->name }}
                        </div>
                    </div>
                </div>
                <div class="maintenance-title__button maintenance-title__item">
                    <div class="transparent-btn">
                        <a href="{{ route('maintenance_brands') }}">@lang('maintenance.select_other_auto')</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-block white-block_grey-strip">
            <div class="modification__items">
                <table>
                    <tr class="grey-strip">
                        <th>@lang('maintenance.spare_part.name')</th>
                        <th>@lang('maintenance.spare_part.count')</th>
                        <th>@lang('maintenance.spare_part.price')</th>
                    </tr>
                    @if( count($products) > 0 )
                        @foreach($products as $product)
                            <tr class="auto-model__item">
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->count }} шт.
                                </td>
                                <td class="transparent-btn">
                                    <a href="{{ route('product', [ "id_category" => $product->category->id, "id_product" => $product->id]) }}">
                                        @lang('maintenance.view_prices')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="auto-model__item">
                            <td>Для данной модификации отсутствуют запчасти</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>
    </section>
@endsection
