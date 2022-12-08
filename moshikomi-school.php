<!doctype html>
<html lang="ja">
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$next = "school-bosyu.php";
$my = new PDO($dsn, 'proe', 'proe');
$sql = "UPDATE 練習試合 SET 処理フラグ=? WHERE 練習試合ID =?;";
$arr = array("1", $_POST["練習試合ID"]);
$stmt = $my->prepare($sql);
$stmt->execute($arr);
header("location:{$next}")
?>

</form>
</html>
