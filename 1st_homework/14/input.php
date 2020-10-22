<?php 

$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['name'])) {
		$message = '名前は必須です。';
	} else {
		// 登録
		try {
	
			$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
			$user = 'root';
			$password = null;
			$password = '';

			$db = new PDO($dsn, $user, $password);
			
			$stmt = $db->prepare('INSERT INTO posts(name) VALUES(:name)');
			$stmt->bindValue(':name', $_POST['name']);		
			$stmt->execute();
	
			$id = $db->lastInsertId();
			$db = NULL;
			
			@session_start();
			$_SESSION['massage'] = '登録に成功しました。';

			header('Location: http://'.$_SERVER['HTTP_HOST'].'/edit.php?id='.$id);
			exit;
		
		} catch(PDOException $e) {
			$message = 'エラーメッセージ：'.$e->getMessage();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題14 DB保存、一覧表示、編集</title>
</head>
<body>
	<h1>登録画面</h1>
	<a href="./index.php">一覧ページ</a>
	<?php if(!empty($message)): ?> 
		<p style="color:red;"><?php echo $message; ?></p>
	<?php endif; ?>
	<form action="./input.php" method="POST">
		<p>名前</p>
		<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>