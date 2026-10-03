
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        form {
            background-color: darkslateblue;
            height: 100px;
            width: 700px;
            margin: 100px auto 0px;
            border-radius: 30px;
        }

        input#oper_value,
        #equals {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin: 40px 0px 0px;
            text-align: center;
        }

        input##equals {
            cursor: pointer;
        }

        form input {
            margin: 30px 10px 0px;
            border-radius: 5px;
            border: none;
            height: 30px;
        }

        input#result {
            width: 210px;
        }

    </style>
   
</head>
<body>
    <form action="script.php" method="get">
        <input type="number" name="num1" id="num1" required placeholder="Введите первое число">
        <input type="text" name="oper_value" id="oper_value" required placeholder="+" required>
        <input type="number" name="num2" id="num2" required placeholder="Введите второе число">
        <button type="submit" id="equals">=</button>
        <input type="text" id="result" readonly placeholder="Результат">
    </form>
</body>
</html>