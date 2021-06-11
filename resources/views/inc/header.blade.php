<header class="header">
    <div class="header__logo">
        <a href="{{ route('main')  }}">
            <img src="/img/new_logo.svg" alt="">
        </a>
    </div>
    <div class="header__menu__basket">
        <nav class="header__menu">
            <ul>
                <li class="header__submenu">
                    <a href="">
                        @lang('maintenance.page_name')
                        <span class="material-icons">expand_more</span>
                    </a>
                    <ul class="header__submenu__item">
                        <li><a href="{{ route('maintenance_brands') }}">@lang('maintenance.spare_parts_for_maintenance')</a></li>
                        @foreach(\App\Http\Models\ProductCategory::all() as $productCategory)
                            <li><a href="{{ route('product-catalog', $productCategory->id) }}">{{ $productCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('about-company')  }}" class="<?php if(Route::current()->getName() == "about-company") echo "active"?>">@lang('about-company.page_name')</a>
                </li>
                <li>
                    <a href="{{ route('news_all')  }}" class="<?php if(Route::current()->getName() == "news_all") echo "active"?>">@lang('news.page_name')</a>
                </li>
                <li>
                    <a href="{{ route('stock_all')  }}" class="<?php if(Route::current()->getName() == "stock_all") echo "active"?>">@lang('stock.page_name')</a>
                </li>
                <li>
                    <a href="{{ route('contacts')  }}" class="<?php if(Route::current()->getName() == "contacts") echo "active"?>">@lang('contacts.page_name')</a>
                </li>
            </ul>
        </nav>

        <a href="{{ route('basket') }}" class="header__basket">
            <span class="material-icons">shopping_cart</span>
            <div class="header__basket__count">
                {{ isset($_COOKIE['basket_id']) ? count(\Cart::session($_COOKIE['basket_id'])->getContent()) : "0" }}
            </div>
        </a>
    </div>

</header>
