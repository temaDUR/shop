<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$title = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$photo = $_POST['photo'];

/*
 * Делаем запрос на изменение строки в таблице products
 */

mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description' , `quantity` = '$quantity'
, `photo` = '$photo'  WHERE `products`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */
header('Location: http://shop/main.php');