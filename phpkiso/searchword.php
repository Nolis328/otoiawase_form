<?php

	//POST送信が行われたらDB接続し、データを取得！！
	if(isset($_POST) && ! empty($_POST['word'])){//idがちゃんと送られてきたら

  // １．データベースに接続する
  $dsn = 'mysql:dbname=otoiawase_form;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  // ２．SQL文を実行する
  $sql = 'SELECT * FROM `survey` WHERE `content` LIKE '."'%".$_POST['word']."%'";
  // SQLを実行
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  //データ取得
  $survey_line=array();//array初期化
  while(1){
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    //取得できるデータが何もなくなるまで繰り返す
    if($rec==false){
      break;
    }
    $survey_line[]=$rec;//これとpreタグの操作を繰り返すことで全ての値が取得できる（繰り返し）
  }
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
    <p>検索したいワードを入力してください。</p>
    <input type="text" name="word">
    <input type="submit" value="検索">
  </form>


<?php
foreach($survey_line as $one_otoiawase){
?>
<?php echo $one_otoiawase["id"] ?><br>
<?php echo $one_otoiawase["nickname"] ?><br>
<?php echo $one_otoiawase["email"] ?><br>
<?php echo $one_otoiawase["content"] ?><br>
<?php echo $one_otoiawase["created"] ?><br>


 <?php }?>

</body>
</html>