<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題13 DB保存、一覧表示</title>
</head>
<body>
	<h1>登録画面</h1>
	<a href="./index.php">一覧ページ</a>
	<form action="./complete.php" method="POST">
		<p>名前</p>
		<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">

		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>