@extends('layouts.app')

@section('title-block')
    Заказ #{{ $orderID }}
@endsection

@section('content')
    <div class="white-block">
        <section>
            <div class="section-title">
            <span class="section-title__text">
                Заказ #{{ $orderID }}
            </span>
                <div class="section-title__hr"></div>
                <div class="section-title__more"></div>
            </div>

            <div class="section-title">
            <span class="section-title__text fz-22">
                Сумма заказа: {{ number_format($orderData[0]->order->total_price, 0, '.', ' ') }} ₽
            </span>
            </div>
            <div class="section-title">
            <span class="section-title__text fz-22">
                Количество товаров: {{ $orderData[0]->order->count_products }}
            </span>
            </div>

            <div class="white-block_grey-strip">
                <table class="bordered-table order-table">
                    <tr class="grey-strip">
                        <th>Изображение</th>
                        <th>Наименование</th>
                        <th>Общая цена</th>
                        <th>Количество товаров</th>
                        <th>Цена за штуку</th>
                    </tr>
                    @foreach($orderData as $order)
                        <tr>
                            <td>
                                <a href="{{ route('product', [ "id_category" => $order->product->category, "id_product" => $order->product->id]) }}">
                                    <img src="/img/{{ $order->product->img }}" alt="">
                                </a>
                            </td>
                            <td style="width: 360px;">
                                <a href="{{ route('product', [ "id_category" => $order->product->category, "id_product" => $order->product->id]) }}">
                                    {{ $order->product->name }}
                                </a>
                            </td>
                            <td>{{ number_format($order->product_total_price, 0, '.', ' ') }} ₽</td>
                            <td>{{ $order->product_quantity }}</td>
                            <td>{{ number_format($order->product_total_price / $order->product_quantity, 0, '.', ' ') }} ₽</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="section-title">
            <span class="section-title__text">
            </span>
            </div>
        </section>



    </div>

@endsection
