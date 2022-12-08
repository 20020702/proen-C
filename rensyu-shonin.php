<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>練習試合承認</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
<h1>練習試合承認</h1>
<div class="box-title">
  <h1>承認画面</h1>
</div>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT * FROM 練習試合 WHERE 処理フラグ = 1;";
$st = $my->query($sql);
$f1 =  "<form method='post' action='moshikomi-school-2.php'>";
$f3 = "</form>";
$html = "<table border='1'><tr><th>練習試合ID</th><th>開催日付</th><th>開催地</th><th>種目</th><th>人数</th><th>処理フラグ</th><th>申し込みボタン</th></tr>";
foreach($st as $row){
$f2 = "";
$html .= "<tr><th>$row[練習試合ID]</th><th>$row[開催日付]</th><th>$row[開催地]</th><th>$row[種目]</th><th>$row[人数]</th><th>$row[処理フラグ]</th>";
foreach($row as $k => $item){
$f2 .= "<input name='{$k}' value='{$item}' type='hidden'>";
}
$html .= "<th>{$f1}{$f2}<input type='submit' value='承認'>{$f3}</th></tr>";
}
$html .= "</table>";

echo($html);
?>

<div class="back-btm">
  <button onclick="location.href='sheet6-2-top.html'">戻る</button>
</div>

</body>
</html>
