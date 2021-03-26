<div class="modal register-modal">
    <div class="modal__title">
        Регистрация
    </div>
    <div class="modal__desc">
        <form action="{{ route('register') }}" method="post" class="main-form">
            @csrf
            <label for="fio">
                ФИО
                <input type="text" name="fio">
            </label>

            <label for="phone">
                Телефон
                <input type="text" name="phone">
            </label>

            <label for="password">
                Пароль
                <input type="password" name="password">
            </label>

            <div class="modal__btn">
                <button type="submit" class="main-btn">Зарегестрироваться</button>
            </div>
        </form>

        <p class="blue-text">Авторизоваться</p>
    </div>


</div>
