<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題4 GET送信</title>
</head>
<body>
	<form action="./04_2.php" method="GET">
		
		<p>ID</p>
		<input type="text" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id'];?>">

		<p>PASSWORD</p>
		<input type="password" name="pw" value="<?php if(isset($_GET['pw'])) echo $_GET['pw'];?>">
		
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>