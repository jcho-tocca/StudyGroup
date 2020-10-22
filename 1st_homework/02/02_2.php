<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題2 GET送信</title>
</head>
<body>
	<form action="./02_1.php" method="GET">

		<p>ID</p>
		<p><?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<p>PASSWORD</p>
		<p><?php echo htmlspecialchars($_GET['pw'], ENT_QUOTES, 'UTF-8'); ?></p>

	</form>
</body>
</html>