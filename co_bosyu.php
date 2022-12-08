<?php
require("./conect.php");
session_start();

if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['契約開始年月日'] === "") {
        $error['契約開始年月日'] = "blank";
    }
    if ($_POST['契約終了年月日'] === "") {
        $error['契約終了年月日'] = "blank";
    }
    if ($_POST['金額'] === "") {
        $error['金額'] = "blank";
    }
    if ($_POST['種目'] === "") {
        $error['種目'] = "blank";
    }

    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: co_check.php');   // check.phpへ移動
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
            <h1>練習試合募集</h1>
            <p>当サービスをご利用するために、次のフォームに必要事項をご記入ください。</p>
            <br>

            <div class="control">
                <label for="契約開始年月日">契約開始年月日</label>
                <input id="契約開始年月日" type="date" name="契約開始年月日" placeholder="契約開始年月日">
                <?php if (!empty($error["契約開始年月日"]) && $error['契約開始年月日'] === 'blank'): ?>
                    <p class="error">＊契約開始年月日を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="契約終了年月日">契約終了年月日</label>
                <input id="契約終了年月日" type="date" name="契約終了年月日" placeholder="契約終了年月日">
                <?php if (!empty($error["契約終了年月日"]) && $error['契約終了年月日'] === 'blank'): ?>
                    <p class="error">＊契約終了年月日を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="金額">金額</label>
                <input id="金額" type="text" name="金額" placeholder="金額">
                <?php if (!empty($error["金額"]) && $error['金額'] === 'blank'): ?>
                    <p class="error">＊金額を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="種目">種目</label>
                    <select name="種目" size="1">
                     <option value="">-種目を選択-</option>
                     <option value="硬式野球">硬式野球</option>
                     <option value="軟式野球">軟式野球(ソフトボール)</option>
                     <option value="サッカー">サッカー</option>
                     <option value="ソフトテニス">ソフトテニス</option>
                     <option value="硬式テニス">硬式テニス</option>
                     <option value="バドミントン">バドミントン</option>
                     <option value="バスケットボール">バスケットボール</option>
                     <option value="バレーボール">バレーボール</option>
                     <option value="ラグビー">ラグビー</option>
                     <option value="卓球">卓球</option>
                     <option value="剣道">剣道</option>
                     <option value="弓道">弓道</option>
                    </select>
                <?php if (!empty($error["種目"]) && $error['種目'] === 'blank'): ?>
                    <p class="error">＊種目を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
</body>
</html>
