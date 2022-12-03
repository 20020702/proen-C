<?php
session_start();
error_reporting(0);
require("./conect.php");
$sql = "SELECT * FROM 学校 WHERE メールアドレス = :mail";
$stmt = $db->prepare($sql);
$stmt->bindValue(':mail', $_POST['メールアドレス']);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if ($_POST['パスワード'] = $member['パスワード']) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['学校ID'] = $member['学校ID'];
    $_SESSION['メールアドレス'] = $member['メールアドレス'];
    $msg = 'ログインしました。';
    $link = '<a href="sheet6-top.html">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_foam.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
