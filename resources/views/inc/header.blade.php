<header class="header">
    <div class="header__logo">
        <a href="{{ route('main')  }}">EMEX</a>
    </div>

    <div class="header__menu__basket">
        <nav class="header__menu">
            <ul>
                <li class="header__submenu">
                    <a href="">
                        Запчасти
                        <span class="material-icons">expand_more</span>
                    </a>
                    <ul class="header__submenu__item">
                        <li><a href="{{ route('maintenance_brands') }}">Запчасти для ТО</a></li>
                        @foreach(\App\Http\Models\ProductCategory::all() as $productCategory)
                            <li><a href="{{ route('product-catalog', $productCategory->id) }}">{{ $productCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('about-company')  }}" class="<?php if(Route::current()->getName() == "about-company") echo "active"?>">О Нас</a></li>
                <li><a href="{{ route('news_all')  }}" class="<?php if(Route::current()->getName() == "news_all") echo "active"?>">Новости</a></li>
                <li><a href="{{ route('stock_all')  }}" class="<?php if(Route::current()->getName() == "stock_all") echo "active"?>">Акции</a></li>
                <li><a href="{{ route('contacts')  }}" class="<?php if(Route::current()->getName() == "contacts") echo "active"?>">Контакты</a></li>
            </ul>
        </nav>

        <a href="{{ route('basket') }}" class="header__basket">
            <span class="material-icons">shopping_cart</span>
            <div class="header__basket__count">
                {{ isset($_COOKIE['basket_id']) ? \Cart::session($_COOKIE['basket_id'])->getTotalQuantity() : "0" }}
            </div>
        </a>
    </div>

</header>
