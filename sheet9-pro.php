<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>学校プロフィール</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
<h1>学校プロフィール</h1>
<div class="box-title">
  <h1>トップページ</h1>
</div>
<?php
$dsn = "mysql:dbname=proe;host=localhost";
$my = new PDO($dsn, "proe", "proe");
$sql = "SELECT 学校ID,学校名,住所,電話番号,種目,メールアドレス FROM 学校;";
$st = $my->prepare($sql);
$st->execute();
$html = "<table border='1'><tr><th>学校ID</th><th>学校名</th><th>住所</th><th>電話番号</th><th>種目</th><th>メールアドレス</th></tr>";
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
