<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=newbd", "root", "");
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}
