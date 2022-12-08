<!doctype html>
<html lang="ja">
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$next = "co-shonin.php";
$my = new PDO($dsn, 'proe', 'proe');
$sql = "UPDATE コーチ募集 SET 処理フラグ=? WHERE コーチ募集ID =?;";
$arr = array("2", $_POST["コーチ募集ID"]);
$stmt = $my->prepare($sql);
$stmt->execute($arr);
header("location:{$next}")
?>
<form method="post" action="bosyu.php">
  <input type="hidden" name="oubokanryou" target="_self" value=1>
</form>
</html>
