<?php
@session_start();

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
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
	<title>課題15 DB保存、一覧表示、編集、削除</title>
</head>
<body>
<title>Lesson14 DB一覧</title>
</head>
<body>
	<h1>一覧画面</h1>
	<p><a href="./input.php">新規作成</a></p>
	<?php if(!empty($_SESSION['massage'])): ?>
	<p style="color:red;">
		<?php 
			echo $_SESSION['massage']; 
			unset($_SESSION['massage']);
		?>
	</p>
	<?php endif; ?>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>名前</th>
			<th>編集</th>
			<th>削除</th>
		</tr>
		<?php foreach ($stmt as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><a href="./edit.php?id=<?php echo $row['id']; ?>">編集</a></td>
			<td><a href="./del.php?id=<?php echo $row['id']; ?>">削除</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>