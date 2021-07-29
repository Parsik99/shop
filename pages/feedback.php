<?php
$title = 'Отзывы';
require '../layout/header.php';
require '../BD.php';
?>
    <div class="content">
        <h3> Оставить отзыв </h3>
        <form method="post" enctype="multipart/form-data">
            <label> Введите Ваше имя:<br>
                <input type="text" name="firstname"/></label><br>
            <label>Укажите свой email:<br>
                <input type="email" name="email"/></label><br>
            <label> Оцените нашу работу:<br>
                <select name="rate">
                    <option value="5">Отлично</option>
                    <option value="4">Хорошо</option>
                    <option value="3">Средне</option>
                    <option value="2">Приемлимо</option>
                    <option value="1 ">Все плохо</option>
                </select><br>
            </label>
            <label>Здесь Вы можете написать свой отзыв (но не более 200 символов):<br>
                <textarea name="text" maxlength="200"></textarea>
            </label><br>

            <input type="file" name="filename" size="10"/>
            <input type="submit" value="Отправить"/>
        </form>
    </div>
<?php
if (isset($_POST["firstname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["rate"]) &&
    isset($_POST["text"]) &&
    isset($_FILES) && $_FILES ["filename"] ["error"] == UPLOAD_ERR_OK
) {
    $filename = $_FILES ["filename"] ["name"];
    move_uploaded_file($_FILES ["filename"] ["tmp_name"], '../imeges/' . $filename);
    $name = htmlentities($_POST["firstname"]);
    $email = htmlentities($_POST["email"]);
    $rate = htmlentities($_POST["rate"]);
    $text = $_POST["text"];

    if (isset($conn)) {
        try {
            $query = "insert into feedbake(name, email, rate, text, img) values('$name', '$email', $rate, '$text', '$filename')";
            $conn->exec($query);
            echo 'Комментарий успешно сохранен';
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo 'Отсутствует подключение к базе данных';
    }
} else {
    echo "Введенные данные некорректны";
}

$result = $conn->query("SELECT name, text, rate, img FROM feedbake");
foreach ($result as $row) { ?>
    <p> Имя пользователя: <?= $row['name']; ?></p>
    <p> Оценка: <?= $row['rate']; ?></p>
    <p> Коментарий: <?= $row['text']; ?></p>
    <p> Фото: <img class="cat" src="../imeges/<?= $row['img']; ?>"></p>
    <?php
}
?>
<?php
require '../layout/footer.php';
