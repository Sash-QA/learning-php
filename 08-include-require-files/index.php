
<!-- Выражения include и require полностью копируют код из подключаемых файлов -->

<?php
include ('header.php');         // Если include не найдет файл, то выполнение кода продолжится
include_once ('header.php');    // include_once подключит файл, только если он еще не использовался ранее
require ('content.php');        // Если require не найдет файл, то выполнение кода будет прервано
require_once ('content.php');   // Аналогично с include_once
?>

Hi! <br><br>                    <!-- Можно вставлять текст между php -->

<?php
include ('comments.php');
echo $a;                        // Переменные, объявленные в подключенных выше файлах, можно использовать в этом файле
$b = 123;                       // Переменные, объявленные в этом файле, можно использовать в подключенных ниже файлах
include ('footer.php');
?>

<!--
Если в подключаемых файлах есть ошибки, то это повлияет и на основной код
Объявление переменной в одном файле и изменение ее в другом файле считается плохой практикой
Подробнее тут https://youtu.be/pQLO6l5lp-Y?si=dTB8pVcHuRll1vXs&t=253
-->