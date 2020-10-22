<?php 
@session_start();

if(empty($_GET['id']) || !preg_match('/^[0-9]+$/', $_GET['id'])) die('不正なアクセスです。');

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = '';
$message = '';

try {
	// データ取得
	$db = new PDO($dsn, $user, $password);

	$stmt = $db->prepare('DELETE FROM posts WHERE id=:id;');
	$stmt->bindValue(':id', $_GET['id']);
	$stmt->execute();

	$row = $stmt->fetch();

	$_SESSION['massage'] = '削除に成功しました。';

	header('Location: ./index.php');
	exit;

} catch(PDOException $e) {

	die('エラーメッセージ：'.$e->getMessage());

}


$db = NULL;

?>