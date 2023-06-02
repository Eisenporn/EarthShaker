<!-- Шапка и бургер меню -->
<header>
    <a href="?"><img src="icon/svg/logo_white.svg" alt=""></a>
    <img src="icon/svg/burger.svg" alt="" class="burger_buttom">
</header>
<div class="burger_menu">
    <div class="burger_window">
        <div>
            <div>
                <a href="?"><img src="icon/svg/logo_white.svg" alt="">
                    <p>Сотрясатель</p>
                </a>
                <img src="icon/svg/cross.svg" alt="" class="burger_buttom_close">
            </div>
            <div>
                <ul>
                    <li><a href="?page=catalog">Музыка</a></li>
                    <li><a href="">Другое</a></li>
                    <li><a href="">Подписка</a></li>
                    <li><a href="">Стать артистом</a></li>
                    <?php 
                        if (isset($_SESSION["user_id"])){
                            if ($user['level']>=3){
                                echo '<li><a href="?page=addalbom">Добавить альбом</a></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div>
            <?php
                if (isset($_SESSION["user_id"]))
                {
                    echo '<a href="?"><button>'.$user['nickname'].'</button></a>';
                    echo '<a href="?exit"><button>Выйти</button></a>';        
                }
                else {
                    echo '
                        <a href="?page=auth"><button>Войти</button></a>
                        <a href="?page=reg"><button>Регистрация</button></a>      
                    ';
                }
            ?>
        </div>
    </div>
</div>