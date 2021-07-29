<?php
$title = 'Каталог';
require '../layout/header.php';
require '../BD.php';

$cot = $conn->query('select name, img from categories');

?>

    <div class="content">
        <div class="carousel">
            <?php foreach ($cot as $value) { ?>
                <div class="content-list">
                    <img src="../imeges/<?= $value ['img']; ?>" alt="Раньше здесь сидел кот, но ему надоело и он ушел">
                    <p class="content-title"><?= $value ['name']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<?php
require '../layout/footer.php';
