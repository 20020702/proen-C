<!doctype html>
<html lang="ja">
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$next = "sheet7-cotop.php";
$my = new PDO($dsn, 'proe', 'proe');
$sql = "UPDATE コーチ募集 SET 処理フラグ=? WHERE コーチ募集ID =?;";
$arr = array("1", $_POST["コーチ募集ID"]);
$stmt = $my->prepare($sql);
$stmt->execute($arr);
header("location:{$next}")
?>

</form>
</html>
