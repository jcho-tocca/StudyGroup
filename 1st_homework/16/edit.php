<?php 
@session_start();

if(empty($_GET['id']) || !preg_match('/^[0-9]+$/', $_GET['id'])) die('不正なアクセスです。');

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = '';

$message = '';

// メッセージセッション処理
if(!empty($_SESSION['massage'])) {
	$message = $_SESSION['massage'];
	unset($_SESSION['massage']);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

	// エスケープ処理
	foreach ($_POST as $key => $val) {
		$_POST[$key] = trim(htmlspecialchars($val, ENT_QUOTES, 'UTF-8'));
	}

	// バリデーション処理
	$errors = array();
	if (empty($_POST['name'])) $errors[] = '名前は必須です。';
	if (empty($_POST['title']))  $errors[] = 'タイトルは必須です。';
	if (empty($_POST['content'])) $errors[] = '内容は必須です。';

	$message .= join('<br />', $errors);

	// 更新
	if(empty($errors)) {
		try {
			$db = new PDO($dsn, $user, $password);
	
			$stmt = $db->prepare("UPDATE posts SET name=:name, title=:title, content=:content WHERE id=:id");
			$stmt->bindValue(':name', $_POST['name']);
			$stmt->bindValue(':title', $_POST['title']);
			$stmt->bindValue(':content', $_POST['content']);
			$stmt->bindValue(':id', $_GET['id']);
			$stmt->execute();
			
			$message = '更新に成功しました。';
			
		} catch(PDOException $e) {
		
		  die('エラーメッセージ：'.$e->getMessage());
		}
	}
} else {
	try {
		// データ取得
		$db = new PDO($dsn, $user, $password);

		$stmt = $db->prepare('SELECT * FROM posts WHERE id=:id;');
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();

		$row = $stmt->fetch();
		if(empty($row)) die('不正なアクセスです。');

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
	<title>課題16 DB保存、一覧表示、編集、削除、ページネーション</title>
</head>
<body>
	<h1>編集画面</h1>
	<a href="./index.php">一覧ページ</a>
	<?php if(!empty($message)): ?>
	<p style="color:red;">
		<?php echo $message; ?>
	</p>
	<?php endif; ?>
	<form action="./edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>ID: <?php echo $row['id'] ?? $_GET['id']; ?></p>
		<p>名前</p>
		<div><input type="text" name="name" value="<?php echo $_POST['name'] ?? $row['name'] ?? ''; ;?>"></div>
		<p>タイトル</p>
		<div><input type="text" name="title" value="<?php echo $_POST['title'] ?? $row['title'] ?? ''; ;?>"></div>
		<p>内容</p>
		<div><textarea name="content" id="" cols="30" rows="10"><?php echo $_POST['content'] ?? $row['content'] ?? ''; ;?></textarea></div>
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>