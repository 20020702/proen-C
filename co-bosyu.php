<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>7.コーチ募集掲示板トップページ</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
  <div class="box-title">
    <h1>コーチ募集掲示板トップページ</h1>
  </div>

  <title>コーチ募集</title>
</head>

  <div class="container">
    <h1 class="h2 mt-5">コーチ募集</h1>
    <div>
      新規のイベントを入力して登録します。
      <form method="post" action="c_insert.php">
        コーチ募集ID　　：<input type="text" name="p1"><br>
        雇用申請者　　：<input type="text" name="p2"><br>
        契約開始年月日：<input type="date" name="p3"><br>
        契約終了年月日：<input type="date" name="p4"><br>
        種目　：<input type="text" name="p5"><br>
        金額：<input type="number" name="p6" value="1000"><br>
        業　務　内　容：<br><textarea name="p2" cols="100" rows="5"></textarea><br>
        <input type="submit" value="登録">
        <input type="hidden" name="type" value="event">
      </form>
    </div>
  </div>

   <div class="back-btm">
    <button onclick="location.href='sheet6-2-top.html'">戻る</button>
  </div>

  <script>
$(function(){
  get_applicant("alist", 2);
});
</body>
