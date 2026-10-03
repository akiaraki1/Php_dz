<?php
if (isset($_GET['num1'], $_GET['num2'], $_GET['oper_value'])) {

    $arr = $_GET;
    $result = null;

    if (is_numeric($arr["num1"]) && is_numeric($arr["num2"])) {

        if (in_array($arr["oper_value"], ['+', '-', '*', '/'])) {

            switch ($arr["oper_value"]) {
                case "+":
                    $result = $arr["num1"] + $arr["num2"];
                    echo ("Результат: {$arr["num1"]}  +  {$arr["num2"]}  =  $result");
                    break;
                case "-":
                    $result = $arr["num1"] - $arr["num2"];
                    echo ("Результат: {$arr["num1"]}  -  {$arr["num2"]}  =  $result");
                    break;
                case "*":
                    $result = $arr["num1"] * $arr["num2"];
                    echo ("Результат: {$arr["num1"]}  *  {$arr["num2"]}  =  $result");
                    break;
                case "/":
                    $result = $arr["num1"] / $arr["num2"];
                    echo ("Результат: {$arr["num1"]}  /  {$arr["num2"]}  =  $result");
                    break;
            }
        } else {
            echo ("Результат: Неверный знак операции. Только: +, -, *, /.");
        }

    } else {
        echo ("Результат: Вы ввели не число");
    }
}
?>