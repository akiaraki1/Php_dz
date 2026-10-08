<?php

//подключаем базу данных
require_once("bd.php"); //$mysql

$result = '';

if (isset($_POST["login"]) && isset($_POST["password"])) {

    $login = trim($_POST["login"]);
    $password = $_POST["password"];

    if (!empty($login) && !empty($password)) {
        $password = password_hash(($password), PASSWORD_DEFAULT);

        $sql = "INSERT INTO `people` (`login`, `password`) VALUES (?, ?)";

        $stmt = $mysql->prepare($sql);
        $stmt->bind_param("ss", $login, $password);

        if ($stmt->execute()) {
            header('Location: login.php');
            die();
        } else {
            $result = 'Вы не зарегистрированы';
        }

    } else {
        $result = 'Заполните все поля';
    }
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
            <h1>Регистрация</h1>
            <p><?= htmlspecialchars($result ?? '') ?></p>
            <div class="login">
                <input type="text" name="login" placeholder="Введите ваш новый логин">
            </div>
            <div class="password">
                <input type="password" name="password" placeholder="Введите новый пароль">
            </div>
            <div class="password">
                <button type="submit">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</body>

</html>