<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題8 POST送信(メール送信)</title>
</head>
<body>
	<form action="./08_2.php" method="POST">
		
		<p>メールアドレス</p>
		<input type="email" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail'];?>">

		<p>タイトル</p>
		<input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>">
		
		<p>本文</p>
		<textarea  name="message" cols="22" rows="10"><?php if(isset($_POST['message'])) echo $_POST['message'];?></textarea>
		<p><button type="submit">送信</button></p>
	</form>
</body>
</html>