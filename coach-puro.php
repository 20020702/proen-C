<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>コーチプロフィール</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
<h1>コーチプロフィール</h1>
<div class="box-title">
  <h1>トップページ</h1>
</div>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT コーチID,コーチ募集ID,名前,種目,メールアドレス FROM コーチ;";
$st = $my->prepare($sql);
$st->execute();
$html = "<table border='1'><tr><th>コーチID</th><th>コーチ募集ID</th><th>名前</th><th>種目</th><th>メールアドレス</th></tr>";
while($row = $st->fetch(PDO::FETCH_ASSOC)){
$html .= "<tr>";
foreach($row as $item) $html .= "<td>{$item}</td>";
$html .= "</tr>";
}
$html .= "</table>";
echo($html);
?>

<div class="back-btm">
  <button onclick="location.href='sheet6-top.html'">戻る</button>
</div>

</body>
</html>
