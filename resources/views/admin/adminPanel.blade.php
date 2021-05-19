<div class="admin-controller">
    <div class="admin-controller__btn">
        <span class="material-icons">admin_panel_settings</span>
    </div>
    <div class="admin-controller__panel">
        <ul>
            <li class="admin-controller__panel__item"><a href="{{ route("news_add") }}">
                    <span class="material-icons">post_add</span>
                    Добавить новость
                </a></li>
            <li class="admin-controller__panel__item"><a href="{{ route("stock_add") }}">
                    <span class="material-icons">receipt</span>
                    Добавить акцию
                </a></li>
            <li class="admin-controller__panel__item"><a href="{{ route("brand_add") }}">
                    <span class="material-icons">directions_car</span>
                    Добавить авто
                </a></li>
            <li class="admin-controller__panel__item"><a href="{{ route("productCategory_add") }}">
                    <span class="material-icons">add_circle_outline</span>
                    Добавить товар
                </a></li>
            @if($user->role == "admin")
                <li class="admin-controller__panel__item"><a href="{{ route("admin.orderList") }}">
                        <span class="material-icons">list_alt</span>
                        Посмотреть список заказов
                    </a></li>
                <li class="admin-controller__panel__item"><a href="{{ route('admin.addManager') }}">
                        <span class="material-icons">person_add</span>
                        Добавить контент-менеджера
                    </a></li>
            @endif
            <li class="admin-controller__panel__item"><a href="{{ route('logout') }}">
                    <span class="material-icons">logout</span>
                    Выйти
                </a></li>
        </ul>
    </div>
</div>
