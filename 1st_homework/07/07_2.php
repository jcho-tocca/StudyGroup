<?php 

// setcookie('キー', '値', 有効期限, パス, ドメイン, セキュアな通信するのか, HTTPのみがクッキーにアクセスするのか);

if (isset($_POST['id']))
{
	setcookie("id", $_POST['id']);
}

if (isset($_POST['pw']))
{
	setcookie("pw", $_POST['pw']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題7 POST送信(COOKIE)</title>
</head>
<body>
	<form action="./07_1.php" method="POST">
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