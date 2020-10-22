<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題3 POST送信</title>
</head>
<body>
		<p>ID</p>
		<p><?php echo htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<p>PASSWORD</p>
		<p><?php echo htmlspecialchars($_POST['pw'], ENT_QUOTES, 'UTF-8'); ?></p>
		
</body>
</html>