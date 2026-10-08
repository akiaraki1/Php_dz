<?php
function getUsersList() {
    global $mysql; // подключение из bd.php

    $sql = "SELECT `login`, `password` FROM `people`";
    $result = $mysql->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}
function existsUser($login) {

    $arr_users= getUsersList();
    
    foreach($arr_users as $user) {
        if($user["login"] === $login) {
            return true;
        }   
    }
    
    return false;  
}
function checkPassword($login, $password) {
    $arr_users = getUsersList();

    foreach ($arr_users as $user) {
        if ($user['login'] === $login && password_verify($password, $user['password'])) {
            return true;
        }
    }

    return false;
}

function getCurrentUser() {
    return $_SESSION['login'] ?? null;
}

?>