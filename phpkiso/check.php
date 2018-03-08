<?php
echo $_POST['nickname'];
echo $_POST['email'];
echo $_POST['content'];


//空送信対策
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$content = $_POST['content'];
	//empty_nickname

if ($nickname == '') {
	echo 'ニックネームが入力されていません。';
} else {
	echo 'ようこそ、' . $nickname .'様';
}
    //empty-mail
if ($email == '') {
	echo 'メールアドレスが入力されていません。';
} else {
	echo 'メールアドレス：' . $email;
}
 	//empty_content
if ($content == '') {
	echo 'お問い合わせ内容が入力されていません。';
} else {
	echo 'お問い合わせ内容：' . $content;
}


  if ($nickname != '' && $email != '' && $content != '') {
    // OKボタンを表示
  }



?>












<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>入力内容確認</h1>

<!-- 戻るボタン -->
<form method="POST" action="thanks.php">
  <input type="button" value="戻る" onclick="history.back()">
  <input type="submit" value="OK">
</form>


 <?php if ($nickname != '' && $email != '' && $content != ''): ?>
  <input type="submit" value="OK">
<?php endif; ?>



</body>
</html>
