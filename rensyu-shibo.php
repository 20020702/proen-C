<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>練習試合絞り込み</title>
</head>
<body>
    <h1>練習試合絞り込み</h1>
    <hr>
    <form method="post" action="rensyu-shibo.php">
        種目：<input name="q"><br>
        並び替え：<select name="o">
            <option value="開催日付">開催日付</option>
            <option value="開催地">開催地</option>
            <option value="人数">人数</option>
        </select>
        <br>
        <input type="submit" value="検索">
    </form>

    </body>
    </html>

<?php
if(isset($_POST["q"], $_POST["o"])){
    $arr = array(sprintf('%%%s%%', $_POST["q"]));
    $dsn = "mysql:dbname=proe;host=localhost";
    $my = new PDO($dsn, "proe", "proe");
    $sql = "SELECT 練習試合ID,開催日付,開催地,種目,人数 FROM 練習試合 WHERE 種目 like ? ORDER BY {$_POST["o"]} ASC;";
    $st = $my->prepare($sql);
    $st->execute($arr);
    $html = "<table border='1'><tr><th>練習試合ID</th><th>開催日付</th><th>開催地</th><th>種目</th><th>人数</th></tr>";
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
  <button onclick="location.href='school-bosyu.php'">学校画面に戻る</button>
</div>
