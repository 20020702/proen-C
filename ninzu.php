<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>人数順</title>
</head>
<body>
<h1>人数順(少ない順)</h1>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT * FROM 練習試合 ORDER BY 人数 ASC;";
$st = $my->prepare($sql);
$st->execute();
$html = "<table border='1'><tr><th>練習試合ID</th><th>開催日付</th><th>開催地</th><th>学校ID</th>
<th>種目</th><th>人数</th></tr>";
while($row = $st->fetch(PDO::FETCH_ASSOC)){
$html .= "<tr>";
foreach($row as $item) $html .= "<td>{$item}</td>";
$html .= "</tr>";
}
$html .= "</table>";
echo($html);
?>

<div class="back-btm">
  <button onclick="location.href='shiborikomi.php'">戻る</button>
</div>

</body>
</html>
