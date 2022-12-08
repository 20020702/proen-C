<!doctype html>
<html lang="ja">
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$next = "rensyu-shonin.php";
$my = new PDO($dsn, 'proe', 'proe');
$sql = "UPDATE 練習試合 SET 処理フラグ=? WHERE 練習試合ID =?;";
$arr = array("2", $_POST["練習試合ID"]);
$stmt = $my->prepare($sql);
$stmt->execute($arr);
header("location:{$next}")
?>
<form method="post" action="bosyu.php">
  <input type="hidden" name="oubokanryou" target="_self" value=1>
</form>
</html>
