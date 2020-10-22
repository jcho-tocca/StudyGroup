<?php 
@session_start();

$message = '';

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

	// 登録
	if(empty($errors)) {
		try {
			
			$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
			$user = 'root';
			$password = '';

			$db = new PDO($dsn, $user, $password);
			
			$stmt = $db->prepare('INSERT INTO posts(name, title, content) VALUES(:name,:title,:content)');
			$stmt->bindValue(':name', $_POST['name']);
			$stmt->bindValue(':title', $_POST['title']);
			$stmt->bindValue(':content', $_POST['content']);
			$stmt->execute();
	
			$id = $db->lastInsertId();
			$db = NULL;
			
			$_SESSION['massage'] = '登録に成功しました。';

			header('Location: ./edit.php?id='.$id);
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
	<title>課題16 DB保存、一覧表示、編集、削除、ページネーション</title>
</head>
<body>
	<h1>登録画面</h1>
	<a href="./index.php">一覧ページ</a>
	<?php if(!empty($message)): ?> 
		<p style="color:red;"><?php echo $message; ?></p>
	<?php endif; ?>
	<form action="./input.php" method="POST">
		<p>名前</p>
		<div><input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"></div>
		<p>タイトル</p>
		<div><input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>"></div>
		<p>内容</p>
		<div><textarea name="content" id="" cols="30" rows="10"><?php if(isset($_POST['content'])) echo $_POST['content'];?></textarea></div>
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>