<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>課題8 POST送信(メール送信)</title>
</head>
<body>
<?php

mb_language('Japanese');
mb_internal_encoding('utf-8');

ini_set('SMTP', 'localhost');
ini_set('smtp_port','1025');

//宛先、Fromを設定
$from_name = 'test@example.com';
$from = 'test@example.com';

$to = trim($_POST['mail']);
$title = trim($_POST['title']);
$message = trim($_POST['message']);

if(empty($to)) {
	
	echo 'アドレスは必須項目です。';
	
} elseif(empty($title)) {
	
	echo 'タイトルは必須項目です。';
	
} elseif(empty($message)) {
	
	echo '本文は必須項目です。';
	
} else {
	
	
	//headerを設定
	$charset = "UTF-8";
	$headers['MIME-Version'] 	= "1.0";
	$headers['Content-Type'] 	= "text/plain; charset=".$charset;
	$headers['Content-Transfer-Encoding'] 	= "8bit";
	$headers['From'] 		= '"'.$from.'"<'.$from_name.'>"';

	//headerを編集
	foreach ($headers as $key => $val) {
		$arrheader[] = $key . ': ' . $val;
	}
	$strHeader = implode("\r\n", $arrheader);

	if(mb_send_mail($to, $title, $message, $strHeader)) {
		echo 'メール送信成功です';
	} else {
		echo 'メール送信失敗です';
	}
}
 ?>
</body>
</html>