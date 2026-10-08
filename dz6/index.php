<?php 
class GuestBook{

    protected $data;
    protected $path_file;


    //В конструктор передается путь до файла с данными гостевой книги,
    //  в нём же происходит чтение данных из ней (используйте защищенное свойство объекта для хранения данных)
    public function __construct($path_file) {
        $this->data = (is_file($path_file)) ? file($path_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $this->path_file = $path_file;
    }

    //Метод getData() возвращает массив записей гостевой книги
    public function getData()
    {
        return $this->data;
    }
    //3. Метод append($text) добавляет новую запись к массиву записей
    public function append($text)
    {
        $this->data[] = $text;
        return $this;
    }
    // Метод save() сохраняет массив в файл
    public function save()
    {
        file_put_contents($this->path_file, implode("\n",$this->data));
    }
}

$path_file = __DIR__ . '/text.txt';

$guesBook = new GuestBook($path_file);

//4*. Попробуйте некоторые методы заканчивать конструкцией return $this; и придумайте этому применение
//Я НЕ ДОДУМАЛСЯ ДО ЭТОГО, ПРОСТО ПОСОМТРЕЛ СЛЕД УРОК ГДЕ ПРЕПОД РАССКАЗАЛ КАК ИСПОЛЬВАТЬ $THIS В КОНЦЕ МЕТОДА
//$guesBook->append('А вдруг и твой мир — это чья-то игра? И откуда тебе знать, что это не так?')->save();

//2*. Продумайте - какие части функционала можно вынести в базовый (родительский) класс TextFile,
//  а какие - сделать в унаследованном от него классе GuestBook

/* class TextFile{

    protected $data;
    protected $path_file;


    //В конструктор передается путь до файла с данными гостевой книги,
    //  в нём же происходит чтение данных из ней (используйте защищенное свойство объекта для хранения данных)
    public function __construct($path_file) {
        $this->data = (is_file($path_file)) ? file($path_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $this->path_file = $path_file;
    }
} 
   

class GuestBook extends TextFile{

    //Метод getData() возвращает массив записей гостевой книги
    public function getData()
    {
        return $this->data;
    }
    //3. Метод append($text) добавляет новую запись к массиву записей
    public function append($text)
    {
        $this->data[] = $text;
    }
    // Метод save() сохраняет массив в файл
    public function save()
    {
        file_put_contents($this->path_file, implode("\n",$this->data));
    }
}

*/

class Uploader {
    private $file;
    //2. Метод isUploaded() проверяет - был ли загружен файл от данного имени поля
    public function isUploaded () {
        return ($_FILES[$this->file]['tmp_name']) ? true : false;
    }

    //3. Метод upload() осуществляет перенос файла (если он был загружен!) из временного места в постоянное
    public function upload() {
        if($this->isUploaded()) {
            $name = (random_bytes(7) . '.png');
            move_uploaded_file($_FILES[$this->file]['tmp_name'], __DIR__ . "/image/$name");

            //редирект
            header('Location:' . $_SERVER['PHP_SELF']);
            exit();
        }
    }
    public function __construct($file_new) {
        $this->file = $file_new;
        $this->upload();
    }
}

if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    //1. В конструктор передается имя поля формы, от которого мы ожидаем загрузку файла
    $uploader =  new Uploader('file');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Отправить</button>
    </form>
</body>
</html>