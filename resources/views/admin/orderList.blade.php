@extends('layouts.app')

@section('title-block')
    Список заказов
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Список заказов
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>

            <div class="white-block_grey-strip">
                <table class="bordered-table order-table">
                    <tr class="grey-strip">
                        <th>Номер заказа</th>
                        <th>Данные клиента</th>
                        <th>Общая цена</th>
                        <th>Количество товаров</th>
                        <th></th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>Заказ #{{ $order->id }}</td>
                            <td>{{ $order->customer->fio }}</td>
                            <td>{{ number_format($order->total_price, 0, '.', ' ') }} ₽</td>
                            <td>{{ $order->count_products }}</td>
                            <td class="transparent-btn">
                                <a href="{{ route("admin.order", $order->id) }}">Посмотреть</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>

        {{ $orders->links('paginate') }}

    </div>

@endsection
