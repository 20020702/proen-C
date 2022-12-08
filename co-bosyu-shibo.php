<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>コーチ募集絞り込み</title>
</head>
<body>
    <h1>コーチ募集絞り込み</h1>
    <hr>
    <form method="post" action="co-bosyu-shibo.php">
        種目：<input name="q"><br>
        並び替え：<select name="o">
            <option value="金額">金額</option>
        </select>
        <br>
        <input type="submit" value="検索">
    </form>
<?php
if(isset($_POST["q"], $_POST["o"])){
    $arr = array(sprintf('%%%s%%', $_POST["q"]));
    $dsn = "mysql:dbname=proe;host=localhost";
    $my = new PDO($dsn, "proe", "proe");
    $sql = "SELECT コーチ募集ID,契約開始年月日,契約終了年月日,金額,種目 FROM コーチ募集 WHERE 種目 like ? ORDER BY {$_POST["o"]} ASC;";
    $st = $my->prepare($sql);
    $st->execute($arr);
    $html = "<table border='1'><tr><th>コーチ募集ID</th><th>契約開始年月日</th><th>契約終了年月日</th><th>金額</th><th>種目</th></tr>";
    while($row = $st->fetch(PDO::FETCH_ASSOC)){
        $html .= "<tr>";
        foreach($row as $item) $html .= "<td>{$item}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    echo($html);
}
?>

<div class="region-select-btm">
  <button onclick="location.href='sheet7-cotop.php'">コーチ募集掲示板へ</button>
</div>

</body>
</html>
