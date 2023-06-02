<?php
$host = "localhost";
$password = "";
$login = "root";
$db = "earthshaker";

// $host="localhost";
// $password="}4vYv6wQev%Y";
// $login="z189";
// $db="z189";

$link = mysqli_connect($host, $login, $password, $db);

if ($link->connect_errno) {
    echo 'Проблемы с подключением';
}
if (!$link->set_charset("utf8")) {
    echo "Ошибка кодировки";
}
