<p><b>Данные о заказчике:</b></p>
<p>ФИО: {{ $customer->fio }}</p>
<p>Телефон: {{ $customer->phone }}</p>
<p></p>
<p><b>Данные о заказе:</b></p>
<p>Сумма заказа: {{ number_format($order->total_price, 0, '.', ' ') }} ₽</p>
<p>Кол-во товаров: {{ $order->count_products }}</p>
<p></p>
<p>Подробнее можно посмотреть по <a href="{{ "http://localhost:3000/order-list/" . $order->id }}">ссылке</a></p>
