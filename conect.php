<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=proe;charset=utf8mb4', 'proe', 'proe');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>
