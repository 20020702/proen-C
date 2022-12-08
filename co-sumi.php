<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>コーチ承認済み</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
<h1>コーチ承認済み</h1>
<div class="box-title">
  <h1>トップページ</h1>
</div>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT コーチ募集ID,契約開始年月日,契約終了年月日,金額,種目 FROM コーチ募集 WHERE 処理フラグ=2;";
$st = $my->prepare($sql);
$st->execute();
$html = "<table border='1'><tr><th>コーチ募集ID</th><th>契約開始年月日</th><th>契約終了年月日</th><th>金額</th><th>種目</th></tr>";
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
