<?php
require_once __DIR__ . '/src/helpers.php';



checkAuth();
$product = currentUser();
$user = currentUser();
?>
<?php
include './components/header.php' 
?>


<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
    
    img {
        height: 50px;
        width: 50px;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Photo</th>
            
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

            $products = mysqli_query($connect, "SELECT * FROM `products`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $products = mysqli_fetch_all($products);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             * ключ 4 - количество
             * ключ 5 - картинка
             */

            foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product[0] ?></td>
                        <td><?= $product[1] ?></td>
                        <td><?= $product[3] ?></td>
                        <td><?= $product[2] ?></td>
                        <td><?= $product[4] ?></td>
                        <td><img
        class="avatar"
        src="<?php echo $user['photo'] ?>"
        
    ></td>
                        <td><a href="product.php?id=<?= $product[0] ?>">Просмотреть</a></td>
                        <td><a href="update.php?id=<?= $product[0] ?>">Изменить</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Удалить</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <h3>Добавление продукции</h3>
    <form action="vendor/create.php" method="post">
        <p>Название</p>
        <input type="text" name="name">

        <p>Описание</p>
        <textarea name="description"></textarea>

        <p>Цена</p>
        <input type="number" name="price"> <br> <br>

        <p>количество</p>
        <input type="number" name="quantity"> <br> <br>

        <label for="photo">Изображение 
        <input
            type="file"
            id="photo"
            name="photo"
            <?php echo validationErrorAttr('photo'); ?>
        >   
        <?php if(hasValidationError('photo')): ?>
            <small><?php echo validationErrorMessage('photo'); ?></small>
        <?php endif; ?>
    </label> <br> <br>


        <button type="submit">Добавить продукт
    </form>
</body>
</html>
