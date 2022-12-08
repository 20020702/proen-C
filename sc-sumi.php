<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>練習試合承認済み</title>
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
$sql = "SELECT 練習試合ID,開催日付,開催地,種目,人数 FROM 練習試合 WHERE 処理フラグ=2;";
$st = $my->prepare($sql);
$st->execute();
$html = "<table border='1'><tr><th>練習試合ID</th><th>開催日付</th><th>開催地</th><th>種目</th><th>人数</th></tr>";
while($row = $st->fetch(PDO::FETCH_ASSOC)){
$html .= "<tr>";
foreach($row as $item) $html .= "<td>{$item}</td>";
$html .= "</tr>";
}
$html .= "</table>";
echo($html);
?>

<div class="back-btm">
  <button onclick="location.href='sheet6-2-top.html'">戻る</button>
</div>
