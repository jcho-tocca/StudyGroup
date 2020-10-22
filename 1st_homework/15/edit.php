<?php 
@session_start();

if(empty($_GET['id']) || !preg_match('/^[0-9]+$/', $_GET['id'])) die('不正なアクセスです。');

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST['name'])) {
		$_SESSION['massage'] = '名前は必須です。';

		header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}

	// 更新
	try {
		$db = new PDO($dsn, $user, $password);

		$stmt = $db->prepare("UPDATE posts SET name=:name WHERE id=:id");
		$stmt->bindValue(':name', $_POST['name']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		
		
		$_SESSION['massage'] = '更新に成功しました。';

		header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
		  
	} catch(PDOException $e) {
	
		die('エラーメッセージ：'.$e->getMessage());
	
	}
} else {
	try {
		// データ取得
		$db = new PDO($dsn, $user, $password);

		$stmt = $db->prepare('SELECT * FROM posts WHERE id=:id;');
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();

		$row = $stmt->fetch();
	} catch(PDOException $e) {
	
		die('エラーメッセージ：'.$e->getMessage());
	
	}
}

$db = NULL;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題15 DB保存、一覧表示、編集、削除</title>
</head>
<body>
	<h1>編集画面</h1>
	<a href="./index.php">一覧ページ</a>
	<?php if(!empty($_SESSION['massage'])): ?>
	<p style="color:red;">
		<?php 
			echo $_SESSION['massage']; 
			unset($_SESSION['massage']);
		?>
	</p>
	<?php endif; ?>
	<form action="./edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>ID: <?php echo $row['id']; ?></p>
		<p>名前</p>
		<input type="text" name="name" value="<?php echo $_POST['name'] ?? $row['name'] ?? ''; ;?>">
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>