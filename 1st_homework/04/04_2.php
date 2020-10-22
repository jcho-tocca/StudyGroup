<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題4 GET送信</title>
</head>
<body>
	<form action="./04_1.php" method="GET">
		<p>ID</p>
		<p><?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<p>PASSWORD</p>
		<p><?php echo htmlspecialchars($_GET['pw'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id'];?>">
		<input type="hidden" name="pw" value="<?php if(isset($_GET['pw'])) echo $_GET['pw'];?>">
		
		<p><button type="submit">戻る</button></p>
	</form>
</body>
</html>