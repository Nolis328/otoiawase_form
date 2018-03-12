<?php

	//POST送信が行われたらDB接続し、データを取得！！
	if(isset($_POST) && ! empty($_POST['id'])){//idがちゃんと送られてきたら

  // １．データベースに接続する
  $dsn = 'mysql:dbname=otoiawase_form;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  // ２．SQL文を実行する
  $sql = 'SELECT * FROM `survey` WHERE `id` ='.$_POST['id'];//特定のidを取得
  // SQLを実行
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  //データ取得
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  // ３．データベースを切断する
  $dbh = null;

 }

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <title>検索ページ</title>
  <meta charset="utf-8">
</head>
<body>
  <form action="" method="post">
    <p>検索したいidを入力してください。</p>
    <input type="text" name="id">
    <input type="submit" value="検索">
  </form>

<?php if (isset($rec)){ ?>
	<hr>
  <?php echo $rec["id"] ?><br>
  <?php echo $rec["nickname"] ?><br>
  <?php echo $rec["email"] ?><br>
  <?php echo $rec["content"] ?><br>
  <?php echo $rec["created"] ?><br>
<?php } ?>

</body>
</html>