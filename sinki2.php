<?php
require("./conect.php");
session_start();

if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['学校名'] === "") {
        $error['学校名'] = "blank";
    }
    if ($_POST['パスワード'] === "") {
        $error['パスワード'] = "blank";
    }
    if ($_POST['メールアドレス'] === "") {
        $error['メールアドレス'] = "blank";
    }

    /* 名前の重複を検知 */
    if (!isset($error)) {
        $コーチ = $db->prepare('SELECT COUNT(*) as cnt FROM 学校 WHERE メールアドレス=?');
        $コーチ->execute(array(
            $_POST['メールアドレス']
        ));
        $record = $コーチ->fetch();
        if ($record['cnt'] > 0) {
            $error['メールアドレス'] = 'duplicate';
        }
    }

    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check2.php');   // check2.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <h1>アカウント作成</h1>
            <p>当サービスをご利用するために、次のフォームに必要事項をご記入ください。</p>
            <br>

            <div class="control">
                <label for="学校名">学校名</label>
                <input id="学校名" type="text" name="学校名" placeholder="学校名">
                <?php if (!empty($error["学校名"]) && $error['学校名'] === 'blank'): ?>
                    <p class="error">＊学校名を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="メールアドレス">メールアドレス</label>
                <input id="メールアドレス" type="text" name="メールアドレス" placeholder="メールアドレス">
                <?php if (!empty($error["メールアドレス"]) && $error['メールアドレス'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="パスワード">パスワード
                <input id="パスワード" type="password" name="パスワード" placeholder="パスワード">
                <?php if (!empty($error["パスワード"]) && $error['パスワード'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
</body>
</html>

<div class="login-btm">
      <button onclick="location.href='login_foam.php'">戻る</button>
    </div>