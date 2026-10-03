<style>
       img {
              display: block;
              margin: 100px auto 0px;
              width: 600px;
              height: 600px;
       }
</style>
<?php

$arr = $_GET;

 foreach ($arr as $id) { 
    switch( $id ) { 
       case "1": ?>
        <img src="image/Латте.jpg" alt="Латте">
        <?php break; ?>
 <?php case "2" ?>
        <img src="image/Мороженое.jpg" alt="Мороженое">
        <?php break; ?>
 <?php case "3" ?>
        <img src="image/Нигири.jpg" alt="Нигири">
        <?php break; ?>
 <?php case "4" ?>
        <img src="image/Тирамису.jpg" alt="Тирамису">
        <?php break; ?>
<?php  default: ?>
        <h1>Изображение не найдено'</h1>;
<?php  break; ?>
<?php 
    }

}
?>
                


