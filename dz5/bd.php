<?php
 $mysql = new mysqli("MySQL-8.4", "root", "", "login_register");

if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

?>