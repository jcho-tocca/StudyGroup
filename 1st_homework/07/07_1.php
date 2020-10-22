<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題7 POST送信(COOKIE)</title>
</head>
<body>
	<form action="./07_2.php" method="POST">
		
		<p>ID</p>
		<input type="text" name="id" value="<?php if(isset($_COOKIE['id'])) echo $_COOKIE['id'];?>">

		<p>PASSWORD</p>
		<input type="password" name="pw" value="<?php if(isset($_COOKIE['pw'])) echo $_COOKIE['pw'];?>">
		
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>