<?php
$title = 'Главная';
require 'layout/header.php';
require 'BD.php';
$items = $conn->query('select name, description, price, img from products');

?>

    <div class="content">
        <h3>Лидеры продаж</h3>
        <div class="carousel">
            <?php
            foreach ($items as $value) { ?>
                <div class="leader">
                    <p class="leader-title"><?= $value ["name"] ?></p>
                    <p><b>Описание:</b><?= $value ["description"] ?></p>
                    <img class="cat" src="imeges/<?php echo $value["img"]; ?>" alt="здесь должен был быть кот">
                    <p><b>Цена:</b><?= $value ["price"] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<?php
require 'layout/footer.php';
