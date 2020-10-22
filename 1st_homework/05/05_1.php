<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題5 POST送信</title>
</head>
<body>
	<form action="./05_2.php" method="POST">
		
		<p>ID</p>
		<input type="text" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id'];?>">

		<p>PASSWORD</p>
		<input type="password" name="pw" value="<?php if(isset($_POST['pw'])) echo $_POST['pw'];?>">
		
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>