<div class="auth_back reg_back">
    <div class="title_auth">
        <h1><span>создание</span> <br> аккаунта</h1>
    </div>
    <div class="form_auth form_reg">
        <?php

            if (isset($_POST["reg"])) {

                $email = $_POST["email"];
                $pass1 = $_POST["pass1"];
                $pass2 = $_POST["pass2"];
                $username = $_POST["username"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
            
                $pass_length1 = strlen($pass1);
                $pass_length2 = strlen($pass2);
            
                $query_email_reg = "SELECT * FROM users WHERE email='$email'";
                $result_reg_email = $link->query($query_email_reg);
                $num=$result_reg_email->num_rows;
            
                $error;
                if (empty($email) || empty($pass1) || empty($pass2) || empty($username) || empty($firstname) || empty($lastname)) {
                    $error = "Не все поля заполнены | ";
                }
            
                if ($pass1 != $pass2){
                    $error.="Пароли не совподают | ";
                }
            
                if ($num){
                    $error.="Введенная вами почта уже зарестрирована | ";
                }
            
                if ($pass_length1 <6 || $pass_length2 <6){
                    $error.="Длина пароля должна быть не менее 6 символов";
                }

                if (!preg_match("/@/", $email))
                {
                    $error = 'Формат почты введен неверно';
                }
            
                if (empty($error))
                {
                    $error="Регистрация прошла успешно";
                    echo '
                    <div class="succes">
                        <p>'.$error.'</p>
                    </div>';
                    $password = md5($pass1);
                    $query_reg = "INSERT INTO `users` (email,first_name,last_name,password,nickname) VALUES ('$email','$firstname','lastname','$password','$username')";
                    $link->query($query_reg);
                    echo '<script>document.location.href="?page=auth"</script>';
                }
                elseif (!empty($error)) {
                    echo '
                    <div class="error">
                        <p>'.$error.'</p>
                    </div>
                    ';
                }
            }
        ?>
        <form method="POST" name="reg">
            <div>
                <label for="email">ЭЛЕКТРОННАЯ ПОЧТА</label>
                <input type="text" name="email" id="email" placeholder="Электронная почта" value="<?= $email ?>">
            </div>
            <div class="form_pass">
                <label for="pass1">ПАРОЛЬ</label>
                <input type="password" name="pass1" id="pass1" placeholder="Пароль">
                <p>Пароль должен состоять как минимум из 6 символов</p>
            </div>
            <div class="form_pass">
                <label for="pass2">ПОВТОРИТЕ ПАРОЛЬ</label>
                <input type="password" name="pass2" id="pass2" placeholder="Повторите пароль">
                <!-- <p>Пароль должен состоять как минимум из 6 символов</p> -->
            </div>
            <div>
                <label for="username">Псевдоним</label>
                <input type="text" name="username" id="username" placeholder="Псевдоним" value="<?= $username ?>">
            </div>
            <div class="fullname">
                <div>
                    <label for="firstname">Имя</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Имя" value="<?= $firstname ?>">
                </div>
                <div>
                    <label for="lastname">Фамилия</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Фамилия" value="<?= $lastname ?>">
                </div>
            </div>
            <div>
                <input type="submit" name="reg" value="зарегистрироваться">
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST["reg"])) {

    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    $pass_length1 = strlen($pass1);
    $pass_length2 = strlen($pass2);

    $query_email_reg = "SELECT * FROM users WHERE email='$email'";
    $result_reg_email = $link->query($query_email_reg);
    $num=$result_reg_email->num_rows;

    $error;
    if (empty($email) || empty($pass1) || empty($pass2) || empty($username) || empty($firstname) || empty($lastname)) {
        $error = "Не все поля заполнены";
    }

    if ($pass1 != $pass2){
        $error.="Пароли не совподают | ";
    }

    if ($num){
        $error.="Введенная вами почта уже зарестрирована | ";
    }

    if ($pass_length1 <6 || $pass_length2 <6){
        $error.="Длина пароля должна быть не менее 6 символов";
    }

    if (empty($error))
    {
        echo "Регистрация прошла успешно";
        $password = md5($pass1);
        $query_reg = "INSERT INTO users (email,first_name,last_name,password,nickname) VALUES ('$email','$firstname','lastname','$password','$username')";
        // echo '<script>document.location.href="?"</script>';
    }
}   
?>