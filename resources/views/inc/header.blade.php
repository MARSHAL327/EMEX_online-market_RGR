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
                        <li><a href="">Электрооборудование</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('about-company')  }}" class="<?php if($_SERVER["REQUEST_URI"] == "/about-company") echo "active"?>">О Нас</a></li>
                <li><a href="{{ route('news_all')  }}" class="<?php if($_SERVER["REQUEST_URI"] == "/news/all") echo "active"?>">Новости</a></li>
                <li><a href="{{ route('stock_all')  }}" class="<?php if($_SERVER["REQUEST_URI"] == "/stock/all") echo "active"?>">Акции</a></li>
                <li><a href="{{ route('contacts')  }}" class="<?php if($_SERVER["REQUEST_URI"] == "/contacts") echo "active"?>">Контакты</a></li>
            </ul>
        </nav>

        <div class="header__basket">
            <span class="material-icons">shopping_cart</span>
            <div class="header__basket__count">1</div>
        </div>
    </div>

</header>
