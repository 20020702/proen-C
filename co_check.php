<?php
require("./conect.php");
session_start();

/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: co_bosyu.php');
    exit();
}

if (!empty($_POST['check'])) {

    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO コーチ募集 SET 契約開始年月日=?, 契約終了年月日=?, 金額=?, 種目=?");
    $statement->execute(array(
        $_SESSION['join']['契約開始年月日'],
        $_SESSION['join']['契約終了年月日'],
        $_SESSION['join']['種目'],
        $_SESSION['join']['金額'],

    ));

    unset($_SESSION['join']);   // セッションを破棄
    header('Location: co_thank.php');   // thank.phpへ移動
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>

            <div class="control">
                <p>契約開始年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['契約開始年月日'], ENT_QUOTES); ?></span></p>
            </div>

            <div class="control">
                <p>契約終了年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['契約終了年月日'], ENT_QUOTES); ?></span></p>
            </div>

            <div class="control">
                <p>種目</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['種目'], ENT_QUOTES); ?></span></p>
            </div>


            <div class="control">
                <p>金額</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['金額'], ENT_QUOTES); ?></span></p>
            </div>

            <br>
            <a href="co_bosyu.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>