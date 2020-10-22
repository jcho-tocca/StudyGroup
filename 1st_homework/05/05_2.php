<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題5 POST送信</title>
</head>
<body>
	<form action="./05_1.php" method="POST">
		<p>ID</p>
		<p><?php echo htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<p>PASSWORD</p>
		<p><?php echo htmlspecialchars($_POST['pw'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<input type="hidden" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id'];?>">
		<input type="hidden" name="pw" value="<?php if(isset($_POST['pw'])) echo $_POST['pw'];?>">
		
		<p><button type="submit">戻る</button></p>
	</form>
</body>
</html>