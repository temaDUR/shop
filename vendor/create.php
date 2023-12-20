<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$photo = $_POST['photo'];


/*
 * Делаем запрос на добавление новой строки в таблицу products
 */

mysqli_query($connect,"INSERT INTO `products` (`id`, `name`, `price`, `description`,`quantity`,`photo`) VALUES (NULL, '$name', '$price', '$description','$quantity','$photo')");

/*
 * Переадресация на главную страницу
 */

header('Location: http://shop/main.php');