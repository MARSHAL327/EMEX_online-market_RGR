<div class="modal login-modal">
    <div class="modal__title">
        Авторизация
    </div>
    <div class="modal__desc">
        <form action="{{ route('login') }}" method="post" class="modal__desc main-form">
            @csrf
            <label for="phone">
                Телефон
                <input type="text" name="phone">
            </label>

            <label for="password">
                Пароль
                <input type="password" name="password">
            </label>

            <div class="modal__btn">
                <button type="submit" class="main-btn">Войти</button>
            </div>
        </form>

        <p class="blue-text">Зарегестрироваться</p>
    </div>


</div>
