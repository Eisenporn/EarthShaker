<div class="auth_back">
    <div class="title_auth">
        <h1><span>Войти в</span> <br> Сотрясатель</h1>
    </div>

    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <p><?= $error; ?></p>
            </div>
        <?php endforeach; ?>

        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>


    <div class="form_auth">
        <form action="/earthshaker/actions/auth.php" method="POST" name="auth">
            <div>
                <label for="email">ЭЛЕКТРОННАЯ ПОЧТА</label>
                <input type="text" name="email" id="email" placeholder="Электронная почта">
            </div>
            <div>
                <label for="password">ПАРОЛЬ</label>
                <input type="password" name="password" id="password" placeholder="Пароль">
            </div>
            <div class="accaunt">
                <p>Нет аккаунта? <a href="?page=reg">Создайте его</a></p>
            </div>
            <div>
                <!-- <button type="submit">Войти</button> -->
                <input type="submit" value="Войти" name="auth">
            </div>
        </form>
    </div>
</div>