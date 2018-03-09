<?php
  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $content = $_POST['content'];



  // フォームからPOST送信で受け取った情報をサニタイズし変数へ代入
  $nickname = htmlspecialchars($_POST['nickname']);
  $email = htmlspecialchars($_POST['email']);
  $content = htmlspecialchars($_POST['content']);

  // １．データベースに接続する
  $dsn = 'mysql:dbname=otoiawase_form;host=localhost';//コロンは「使いますよ」の意味,ローカルホストは自分のサーバーという意味別の場合はIP
  $user = 'root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');
          //dbに何を入れるか？送信情報＋送信識別子＋カラム数


  // ２．SQL文を実行する
  $sql = "INSERT INTO `survey` ( `nickname`, `email`, `content`) VALUES ( ?, ?, ?);";
    //紫色になっているとエラー 全体をダブルクォートで囲えば解決。変数をぶち込む
    //SQLインジェクション（不正操作）を防ぐ


  //プリペアードステートメント
  $data=array($nickname,$email,$content);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);//$dataを接続してEXECUTE（完成させて実行）

  // ３．データベースを切断する
  $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>送信完了</title>
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <div>
    <h3>お問い合わせ詳細内容</h3>
    <p>ニックネーム：<?php echo $nickname; ?></p>
    <p>メールアドレス：<?php echo $email; ?></p>
    <p>お問い合わせ内容：<?php echo $content; ?></p>
  </div>
</body>
</html>
