<div class="product-card-wrapper">
    <div class="product-card__loader">
        <div class="loader">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                <circle cx="35" cy="35" r="32.5" stroke="url(#paint0_linear)" stroke-width="5"/>
                <defs>
                    <linearGradient id="paint0_linear" x1="35" y1="0" x2="35" y2="70" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#DC0000"/>
                        <stop offset="1" stop-color="#0F0397"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>

    @if( count($paginateListProduct) > 0 )
        <div class="product-card">
            @foreach($paginateListProduct as $product)
                <a href="{{ route('product', [ "id_category" => $categoryID, "id_product" => $product->id]) }}"
                   class="product-card__item">
                    <div class="product-card__img">
                        <img src="/img/{{ $product->img }}" alt="">
                    </div>
                    <div class="product-card__price">
                        {{ number_format($product->price, 0, '.', ' ') }} ₽
                    </div>
                    <div class="product-card__name">
                        {{ $product->name }}
                    </div>
                    <div class="product-card__properties">
                        @foreach($product->properties as $propertyItem)
                            <div class="product-cards__properties-item">
                                {{ $propertyItem->properties->name }}: {{ $propertyItem->value }}
                            </div>
                        @endforeach
                    </div>
                    <div class="main-btn main-btn_red">
                        Подробнее
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="fz-22 bold-text">По данному фильтру ничего не найдено</div>
    @endif

    {{ $paginateListProduct->links('paginate') }}

    <pre>
        <div class="test"></div>
    </pre>
</div>
