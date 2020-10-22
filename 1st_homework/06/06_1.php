<?php 

session_start();

// session.save_path
// session.save_handler
// session_set_save_handler()
// session.serialize_handler

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題6 POST送信(SESSION)</title>
</head>
<body>
	<form action="./06_2.php" method="POST">
		
		<p>ID</p>
		<input type="text" name="id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id'];?>">

		<p>PASSWORD</p>
		<input type="password" name="pw" value="<?php if(isset($_SESSION['pw'])) echo $_SESSION['pw'];?>">
		
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>