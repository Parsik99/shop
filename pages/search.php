<?php
$title = ' Поиск';
require '../layout/header.php';
require '../BD.php';
?>
    <div class="content">

        <form method="post">
            <label>Поиск:
                <input type="text" name="search" minlength="3"></label>
            <label>
                <input type="submit" value="Найти">
            </label>
        </form>
    </div>
<?php
if (isset($_POST, $_POST['search'])) {
    $name = htmlentities($_POST['search']);
    $query = "SELECT name, description, img FROM products WHERE name LIKE '%$name%' or 'description' LIKE '%$name%'";

    $items = $conn->query($query) ?: [];

    foreach ($items as $row) { ?>
        <p> Имя пользователя: <?= $row['name']; ?></p>
        <p> Описание:<?= $row['description']; ?></p>
        <p> фото товара: <img class="cat" src="../imeges/<?= $row['img'];?>"></p>

        <?php
    }
}
?>
<?php
require '../layout/footer.php';
