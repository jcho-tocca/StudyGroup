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
	<title>課題14 DB保存、一覧表示、編集</title>
</head>
<body>
<title>Lesson14 DB一覧</title>
</head>
<body>
	<h1>一覧画面</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>名前</th>
			<th>編集</th>
		</tr>
		<?php foreach ($stmt as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><a href="./edit.php?id=<?php echo $row['id']; ?>">編集</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p><a href="./input.php">新規作成</a></p>
</body>
</html>