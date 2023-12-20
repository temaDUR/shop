<?php
require_once __DIR__ . '/src/helpers.php';
require_once 'config/connect.php';
?>

<?php
include './components/header.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
?>
<?php
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
    // Проверка формата изображения
    $image_data = base64_decode($row['photo']);
    $image_info = getimagesizefromstring($image_data);
    if ($image_info !== false) {
        echo "Формат изображения: " . $image_info['mime'] . "<br>";
    } else {
        echo "Ошибка при получении информации об изображении<br>";
    }
  
    // Вывод информации о товаре, включая изображение
    echo "Название товара: " . $row['name'] . "<br>";
    echo "Цена: " . $row['price'] . "<br>";
    echo "Количество: " . $row['quantity'] . "<br>";
    echo "Описание: " . $row['description'] . "<br>";
    echo "Фото: <img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Alternative text'><br>";
    echo "<br>";
      

    echo '<button class="btn1" id="btn1" action="" >купить</button> <br><br>';



      
      
    }
  }
  
?>
</body>
</html>