<?php
@session_start();

// 現在のページ
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

// 表示件数
$display_num = 10;

// ページリング表示数
$display_link_num = 10;

// オフセット
$offset = ($current_page - 1) * $display_num;

// 総件数 
$total = 0;

$dsn = 'mysql:host=localhost;dbname=training;charset=utf8';
$user = 'root';
$password = '';

$sort = '';
$params = '';

// 並び替え
if(!empty($_GET['id_sort']))
{
	$sort = "ORDER BY id ASC";
	$params .= "&id_sort={$_GET['id_sort']}";
}
if(!empty($_GET['id_rsort']))
{
	$sort = "ORDER BY id DESC";
	$params .= "&id_rsort={$_GET['id_rsort']}";
}

if(!empty($_GET['name_sort']))
{
	$sort = "ORDER BY name ASC";
	$params .= "&name_sort={$_GET['name_sort']}";
}

if(!empty($_GET['name_rsort']))
{
	$sort = "ORDER BY name DESC";
	$params .= "&name_rsort={$_GET['name_rsort']}";
}

if(!empty($_GET['title_sort']))
{
	$sort = "ORDER BY title ASC";
	$params .= "&title_sort={$_GET['title_sort']}";
}
if(!empty($_GET['title_rsort']))
{
	$sort = "ORDER BY title DESC";
	$params .= "&title_rsort={$_GET['title_rsort']}";
}

// 総件数取得
try {
	
	$db = new PDO($dsn, $user, $password);
	
	$sql = "SELECT COUNT(*) AS total FROM posts {$db->query($sort)};";

	$stmt = $db->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $total = $result['total'];
    }

	$db = NULL;

} catch(PDOException $e) {
	die('エラーメッセージ：'.$e->getMessage());
}

// データ取得
try {

	$db = new PDO($dsn, $user, $password);

	$sql = "SELECT * FROM posts {$db->query($sort)} LIMIT :offset, :limit;";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
	$stmt->bindValue(':limit', $display_num, PDO::PARAM_INT);
	$stmt->execute();

	$db = NULL;

} catch(PDOException $e) {
	die('エラーメッセージ：'.$e->getMessage());
}


// 最大ページ数
$max_page = ceil($total/$display_num);

// 次グループの先頭ページ
$next_group_first = ceil($current_page/$display_link_num) * $display_link_num + 1 ;

// 現在のページグループ
$current_group_first = $next_group_first - $display_link_num;

// 前グループの後尾ページ
$previous_group_last = $current_group_first - 1 ;

// 最終ページ
$endpage = ($current_group_first + ($display_link_num -1));
if($max_page < $endpage) $endpage = $max_page;

// 存在しないページ処理
if ($max_page < $current_page) die('無効なページです。');

echo '総件数： '.$total.'<br>';
echo '表示件数 '.$display_num.'<br>';
echo 'ページリング表示数 '.$display_link_num.'<br>';
echo '最大ページ数： '.$max_page.'<br>';
echo '現グループの先頭ページ： '.$current_group_first.'<br>';
echo '前グループの後尾ページ： '.$previous_group_last.'<br>';
echo '次グループの先頭ページ： '.$next_group_first.'<br>';
echo '現在のページの最終ページ： '.$endpage.'<br>';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題16 DB保存、一覧表示、編集、削除、ページネーション</title>
</head>
<body>
<title>Lesson14 DB一覧</title>
</head>
<body>
	<h1>一覧画面</h1>
	<p><a href="./input.php">新規登録</a></p>
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
			<th>ID<a href="./index.php?id_sort=1">▲</a><a href="./index.php?id_rsort=1">▼</a></th>
			<th>名前<a href="./index.php?name_sort=1">▲</a><a href="./index.php?name_rsort=1">▼</a></th>
			<th>タイトル<a href="./index.php?title_sort=1">▲</a><a href="./index.php?title_rsort=1">▼</a></th>
			<th>編集</th>
			<th>削除</th>
		</tr>
		<?php foreach ($stmt as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><a href="./edit.php?id=<?php echo $row['id']; ?>">編集</a></td>
			<td><a href="./del.php?id=<?php echo $row['id']; ?>" onclick="return confirm('本当に削除しますか？')">削除</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div>
	<?php if($current_group_first > 1): ?>
		<a href="./?page=1<?php echo $params; ?>">最初へ</a>
		<a href="./?page=<?php echo $previous_group_last; ?><?php echo $params; ?>">前へ</a>
	<?php endif; ?>

	<?php foreach (range($current_group_first, $endpage) as $page): ?>
		<?php if($page == $current_page): ?>
			<?php echo $page; ?>
		<?php else: ?>
			<a href="./?page=<?php echo $page; ?><?php echo $params; ?>"><?php echo $page; ?></a>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php if($max_page >= $next_group_first): ?>
		<a href="./?page=<?php echo $next_group_first; ?><?php echo $params; ?>">後ろへ</a>
		<a href="./?page=<?php echo $max_page; ?><?php echo $params; ?>">最後へ</a>
	<?php endif; ?>
	</div>
</body>
</html>