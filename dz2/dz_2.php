<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            border: 2px solid;
        }
        td {
            text-align: center;
        }

    </style>
</head>

<body>
       <?php
    function and_($a, $b)
    {
        return ($a && $b) ? '1' : '0';
    }
    function or_($a, $b)
    {
        return ($a || $b) ? '1' : '0';
    }
    function xor_($a, $b)
    {
        return ($a xor $b) ? '1' : '0';
    }
    ?>

    <table>
        <tr>
            <th>a</th>
            <th>b</th>
            <th>or</th>
            <th>and</th>
            <th>xor</th>
        </tr>
        <tr>
            <td>0</td>
            <td>0</td>
            <td><?php echo or_(0, 0) ?></td>
            <td><?php echo and_(0, 0) ?></td>
            <td><?php echo xor_(0, 0) ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>0</td>
            <td><?php echo or_(1, 0) ?></td>
            <td><?php echo and_(1, 0) ?></td>
            <td><?php echo xor_(1, 0) ?></td>
        </tr>
        <tr>
            <td>0</td>
            <td>1</td>
            <td><?php echo or_(0, 1) ?></td>
            <td><?php echo and_(0, 1) ?></td>
            <td><?php echo xor_(0, 1) ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td><?php echo or_(1, 1) ?></td>
            <td><?php echo and_(1, 1) ?></td>
            <td><?php echo xor_(1, 1) ?></td>
        </tr>
    </table> 

<hr>

    <?php
    $a = 2;
    $b = 4;
    $c = -6;

    function D(int | float $a, int | float $b, int | float $c) : int | float
    {
        $result = ($b ** 2) - (4 * $a * $c);
        return $result;
    }

    if ($a == 0) {
        // Линейное уравнение bx + c = 0
        if ($b == 0) {
            echo ($c == 0) ? 'Бесконечно много решений' . '<br>' : 'Нет корней' . '<br>';
        } else {
            echo -$c / $b . '<br>';
        }
    } else {
        // вызов функции
        $d = D($a, $b, $c);
    


    if ($d > 0) {

        $x1 = (-$b + ($d ** 0.5)) / (2 * $a);
        $x2 = (-$b - ($d ** 0.5)) / (2 * $a);
        echo "x1 = $x1" . '<br>';
        echo "x2 = $x2" . '<br>';

    } else if ($d === 0) {

        $x = -$b / (2 * $a);
        echo "x = $x" . '<br>';

    } else {
        echo 'Нет корней' . '<br>';
    }
}

  /*  Проведите самостоятельное исследование на тему "Что возвращает оператор include, если его использовать как функцию?"
    Если файл успешно подключён и не содержит return, include возвращает 1 (целое число).
    Если файл не найден или не может быть подключён, include возвращает false и выдаёт предупреждение (Warning).
  */

    ?>
</body>

</html>