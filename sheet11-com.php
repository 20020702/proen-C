<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>11.練習試合募集コメント入力</title>
<link rel="stylesheet" style type="text/css" href="style.css">
</head>
<body>
  <form method="post">
	<h1>入力機能 練習試合</h1>
	<p>試しにコメントしてみて下さい</p>
	<hr>
	<table>
  	<tr>
    	<td>名前</td>
    	<td><input type="text" name="user"></td>
  	</tr>
  	<tr>
    	<td>コメント</td>
    	<td><textarea name="comment"></textarea></td>
  	</tr>
	</table>
	<input type="submit" name="submit" value="送信">
  </form>
  <hr>

  <h2>コメント履歴</h2>
  <table>
	<thead>
  	<tr>
    	<th>ユーザー名</th>
        	<th>コメント</th>
    	</tr>
	</thead>
	<tbody>
  	<?php
  	$conn = mysqli_connect($hostname, $Username, $Password, $db);
  	if($qry = mysqli_query($conn,"SELECT * FROM input")){
  	while($show = mysqli_fetch_assoc($qry)){
    	  echo "<tr>";
      	echo "<td>".$show['user']."</td>";
      	echo "<td>".$show['comment']."</td>";
    	  echo "</tr>";
  	}
  	}
  	?>
	</tbody>
  </table>
  <hr>
  <hr>
  <div style="background-color:gray;color:white;text-align:right">
  <?php
	echo 'Current PHP version: ' . phpversion();
	echo '<br />';
	echo 'Current MySQL version: ' . mysqli_get_server_info($conn);
	mysqli_close($conn);
   ?>
   </div>
</body>
</html>
