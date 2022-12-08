<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>コーチ承認</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
<h1>コーチ承認</h1>
<div class="box-title">
  <h1>承認画面</h1>
</div>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT * FROM コーチ募集 WHERE 処理フラグ = 1;";
$st = $my->query($sql);
$f1 =  "<form method='post' action='moushikomi-2.php'>";
$f3 = "</form>";
$html = "<table border='1'><tr><th>コーチ募集ID</th><th>契約開始年月日</th><th>契約終了年月日</th><th>金額</th><th>処理フラグ</th><th>申し込みボタン</th></tr>";
foreach($st as $row){
$f2 = "";
$html .= "<tr><th>$row[コーチ募集ID]</th><th>$row[契約開始年月日]</th><th>$row[契約終了年月日]</th><th>$row[金額]</th><th>$row[処理フラグ]</th>";
foreach($row as $k => $item){
$f2 .= "<input name='{$k}' value='{$item}' type='hidden'>";
}
$html .= "<th>{$f1}{$f2}<input type='submit' value='承認'>{$f3}</th></tr>";
}
$html .= "</table>";

echo($html);
?>

<div class="back-btm">
  <button onclick="location.href='co-shibo.php'">絞り込み機能</button>
</div>

<div class="back-btm">
  <button onclick="location.href='sheet6-2-top.html'">戻る</button>
</div>

</body>
</html>
