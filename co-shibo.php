<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>コーチ絞り込み</title>
</head>
<body>
    <h1>コーチ絞り込み</h1>
    <hr>
    <form method="post" action="co-shibo.php">
        種目：<input name="q"><br>
        並び替え：<select name="o">
            <option value="年齢">年齢</option>
        </select>
        <br>
        <input type="submit" value="検索">
    </form>
<?php
if(isset($_POST["q"], $_POST["o"])){
    $arr = array(sprintf('%%%s%%', $_POST["q"]));
    $dsn = "mysql:dbname=proe;host=localhost";
    $my = new PDO($dsn, "proe", "proe");
    $sql = "SELECT コーチID,名前,種目,年齢,評価,メールアドレス FROM コーチ WHERE 種目 like ? ORDER BY {$_POST["o"]} ASC;";
    $st = $my->prepare($sql);
    $st->execute($arr);
    $html = "<table border='1'><tr><th>コーチID</th><th>名前</th><th>種目</th><th>年齢</th><th>評価</th><th>メールアドレス</th></tr>";
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
  <button onclick="location.href='co-shonin.php'">コーチ承認画面へ</button>
</div>

</body>
</html>
