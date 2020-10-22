<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題12 DB保存</title>
</head>
<body>
	<form action="./complete.php" method="POST">

		<p>名前</p>
		<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">

		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>