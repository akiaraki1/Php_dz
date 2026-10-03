<?php
//функция читает содержимое файла и помещает его в массив
function rf($file)
{

    $arr = file(
        __DIR__ . '/' . $file,
        FILE_IGNORE_NEW_LINES
        |
        FILE_SKIP_EMPTY_LINES
    );
    return $arr;
}
//функция добавляет новый текст в конец файла
function textAdd()
{
    // trim Удаляет пробельные или другие символы в начале и конце строки
    $newtext = trim($_POST['newtext'] ?? '');

    //если текста нет, то происходит остановка функции
    if ($newtext === '') {
        return;
    }

    // Записываем содержимое в файл
    // PHP_EOL Корректный символ конца строки (End Of Line) для платформы.
    // с флагом FILE_APPEND, чтобы дописать содержимое в конец файла,
    // и флагом LOCK_EX, чтобы никто другой не мог записывать данные в файл в то же самое время
    file_put_contents(__DIR__ . '/text.txt', $newtext . PHP_EOL, FILE_APPEND | LOCK_EX);

    //редирект 
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

//если $_POST['newtext'] существует, вызываем функцию.
if (isset($_POST['newtext'])) {
    textAdd();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        main {
            background-color: #8B5A2B;
            padding-top: 10px;
            width: 550px;
            border-radius: 20px;
            margin: 100px auto 0px;
        }

        textarea {
            display: block;
            margin: 10px auto 0px;
            width: 500px;
            height: 500px;
            border-radius: 10px;
            background-color: #F5E6D3;
            color: #5C4033;
        }

        form {
            padding: 10px;
            margin: 10px auto 0px;
            width: 500px;
            height: auto;
            border-radius: 10px;
        }

        input {
            width: 80%;
            border-radius: 10px;
            border: 1px solid black;
            background-color: #F5E6D3;
            color: #5C4033;
        }

        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body>
    <main>
         <h1>Гостевая книга</h1>
        <textarea readonly><?php
        foreach (rf('text.txt') as $value) {
            echo htmlspecialchars($value) . "\n";
        }
        ?></textarea>
        <form method="post">
            <input type="text" name="newtext" placeholder="Добавьте запись" required>
            <button type="submit">Отправить</button>
        </form>
    </main>
</body>

</html>