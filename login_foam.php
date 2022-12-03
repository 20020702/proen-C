<!DOCTYPE html>
<head>
<meta charset="Sutf-8">
<title>1.ログイン画面</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
  <form action="login.php" method="post">
  <div class="box-title">
        <h1>コーチ雇用・練習試合</h1>
      </div>
<div class="login-top">
    <label>
        メールアドレス：
        <input type="text" name="メールアドレス" required>
    </label>
</div>
<div class="login-top">
    <label>
        パスワード：
        <input type="password" name="パスワード" required>
    </label>
</div>
<div class="login-btm">
        <button type="submit" class="btn">ログイン</button>
      </div>
</form>
    <div class="login-btm">
      <button onclick="location.href='sinki.php'">新規登録</button>
    </div>
    <div class="login-btm">
      <button onclick="location.href='index.php'">戻る</button>
    </div>

</body>
</html>
