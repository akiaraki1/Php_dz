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

        div {
            background-color: darkslateblue;
            height: 1000px;
            width: 1000px;
            margin: 100px auto 0px;
            border-radius: 30px;
            display: grid;
            grid-template-columns: repeat(2, 400px);
            justify-content: space-evenly;
            gap: 20px;
            margin-top: 20px;
        }

        img {
            width: 350px;
            height: 350px;
            cursor: pointer;
            margin: 40px;
            border-radius: 20px;
            ;
        }
    </style>
</head>

<body>
    <?php
    $arr = [
        1 => 'Латте.jpg',
        2 => 'Мороженое.jpg',
        3 => 'Нигири.jpg',
        4 => 'Тирамису.jpg',
    ];
    ?>


    <div>
        <?php foreach ($arr as $id => $file) { ?>
            <a href="image.php?id=<?php echo $id; ?>">
                <img src="image/<?php echo $file; ?>" alt="<?php echo $file; ?>">
            </a>
        <?php } ?>
    </div>
</body>

</html>