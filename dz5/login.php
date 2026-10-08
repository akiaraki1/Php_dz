<?php
//объявляем ссесию
session_start();

//подкл функции
require_once("function.php");

if(getCurrentUser()) {
    header("Location: photo-gallery.php");
    die();
}
//подключаем базу данных
require_once("bd.php"); //$mysql

$result = '';

if (isset($_POST["login"]) && isset($_POST["password"])) {

    $login = trim($_POST["login"]);
    $password = $_POST["password"];
    //проверяем логин и пароль
    if(checkPassword($login, $password)) {
        $_SESSION["login"] = $login;
        session_regenerate_id();
        header("Location: photo-gallery.php");
        die();
    } else {
        $result = 'Неверные данные';
    }

}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
        .container {
            background-color: cornflowerblue;
            max-width: 600px;
            margin: 250px auto 100px;
            padding: 15px;
            border-radius: 20px;
        }
        input {
            width: 70%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="" method='post'>
    <div class="container">
        <h1>Авторизация</h1>
        <h2><?= htmlspecialchars($result ?? '')?></h2>
        <div class="login">
            <input type="text" name="login" placeholder="Введите ваш логин">
        </div>
        <div class="password">
            <input type="password" name="password" placeholder="Введите пароль">
        </div>
        <div class="password">
            <button type="submit">Войти</button>
        </div>
    </div>
    </form>
</body>
</html>