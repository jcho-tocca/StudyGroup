<?php 

session_start();

if(isset($_POST['id'])) $_SESSION['id'] = $_POST['id'];
if(isset($_POST['pw'])) $_SESSION['pw'] = $_POST['pw'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題6 POST送信(SESSION)</title>
</head>
<body>
	<form action="./06_1.php" method="POST">
		<p>ID</p>
		<p><?php echo htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<p>PASSWORD</p>
		<p><?php echo htmlspecialchars($_SESSION['pw'], ENT_QUOTES, 'UTF-8'); ?></p>
		
		<input type="hidden" name="id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id'];?>">
		<input type="hidden" name="pw" value="<?php if(isset($_SESSION['pw'])) echo $_SESSION['pw'];?>">
		
		<p><button type="submit">戻る</button></p>
	</form>
</body>
</html>