<?php use Illuminate\Support\Facades\Auth; ?>

<div class="header-contact">
    <div class="wrapper">
        <div class="header-contact_left">
            <div class="header-contact__item">
                <span class="material-icons">location_on</span>
                г. Севастополь, ул. Суворова, д. 1
            </div>
            <div class="header-contact__item">
                <span class="material-icons">schedule</span>
                Пн-Пт 9:00 - 18:00
            </div>
            <div class="header-contact__item">
                <span class="material-icons">call</span>
                <a href="tel: +79787770707">+7 (978) 777 07 07</a>
            </div>
            <div class="header-contact__item">
                <span class="material-icons">email</span>
                <a href="mailto: Emex@info.com">Emex@info.com</a>
            </div>
        </div>
        <div class="header-contact_right">
            <div class="lang-change header-contact__item">
                Русский
                <span class="material-icons">expand_more</span>
                <div class="lang-change__items">
                    <ul>
                        <li class="lang-change__item active"><a href="">Русский</a></li>
                        <li class="lang-change__item"><a href="">Английский</a></li>
                    </ul>
                </div>

            </div>

            @if(false)
                @if (Auth::check())
                    <a href="{{ route('logout')  }}" class="header-contact_right__auth header-contact__item">
                        Выход
                        <span class="material-icons">logout</span>
                    </a>
                @else
                    <div class="header-contact_right__auth header-contact__item auth">
                        Вход
                        <span class="material-icons">account_circle</span>
                    </div>
                @endif
            @endif

        </div>
    </div>
</div>
