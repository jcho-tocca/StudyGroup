<?php
$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = null;
$password = '';

// データ取得
try {

	$db = new PDO($dsn, $user, $password);

	$stmt = $db->prepare('SELECT * FROM posts ORDER BY id DESC;');
	$stmt->execute();

	$db = NULL;
  
} catch(PDOException $e) {
  
	die('エラーメッセージ：'.$e->getMessage());
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題13 DB保存、一覧表示</title>
</head>
<body>
	<h1>一覧画面</h1>
	<p><a href="./input.php">新規作成</a></p>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>名前</th>
		</tr>
		<?php foreach ($stmt as $row): ?>
		<tr>
			<td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
			<td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>