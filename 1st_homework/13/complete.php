<?php 

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = null;
$password = '';
$message = '';

if (empty($_POST['name'])) {
    $message = '名前は必須です。';
} else {
	// 登録
	try {

		$db = new PDO($dsn, $user, $password);
		
		$stmt = $db->prepare('INSERT INTO posts(name) VALUES(:name)');
		$stmt->bindValue(':name', $_POST['name']);		
		$stmt->execute();

		$db = NULL;
		
		$message = 'データベースに登録できました。';
	
	} catch(PDOException $e) {
		$message = 'エラーメッセージ：'.$e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題13 DB保存、一覧表示</title>
</head>
<body>
	<h1>完了画面</h1>
	<a href="./index.php">一覧ページ</a>
	<form action="./input.php" method="POST">
		<p><?php echo $message; ?></p>
		
		<input type="hidden" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">

		<p><button type="submit">戻る</button></p>
	</form>
</body>
</html>

<!-- 参考資料 -->
<!-- https://qiita.com/il-m-yamagishi/items/5cb5308064f32d1c6ed5 -->
<!-- https://www.javadrive.jp/php/pdo/ -->

<!-- public PDO::__construct ( string $dsn [, string $username [, string $passwd [, array $options ]]] ) -->
<!-- DSN形式 - mysql:dbname=DB名;host=ホスト名;port=ポート番号 -->