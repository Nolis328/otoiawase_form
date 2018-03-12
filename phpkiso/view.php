<?php
// １．データベースに接続する
	//fetchの動きに注目上から順にとり、次の項目を取る準備をしてくれる
$dsn = 'mysql:dbname=otoiawase_form;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

// ２．SQL文を実行する
$sql = 'SELECT * FROM `survey` ORDER BY `created` DESC';//これだけで取れる
$stmt = $dbh->prepare($sql);
$stmt->execute();

	//データを取得=fetchを実行
	$survey_line=array();//array初期化
	while(1){
	  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
	  //取得できるデータが何もなくなるまで繰り返す
		if($rec==false){
			break;
		}
		$survey_line[]=$rec;//これとpreタグの操作を繰り返すことで全ての値が取得できる（繰り返し）
	}
				// $rec=$stmt->fetch(PDO::FETCH_ASSOC);
				// $survey_line[]=$rec;


// ３．データベースを切断する
$dbh = null;
	//arrayをする意味は配列に一度保存してから切断し、あとから取り出すことができ、美しく効率的。
	//資料のものよりデータ処理の手数が短く切ることができるということ。
?>


<?php
// var_dump($survey_line);
foreach($survey_line as $one_otoiawase){
?>
<?php echo $one_otoiawase["id"] ?><br>
<?php echo $one_otoiawase["nickname"] ?><br>
<?php echo $one_otoiawase["email"] ?><br>
<?php echo $one_otoiawase["content"] ?><br>
<?php echo $one_otoiawase["created"] ?><br>
	<form action="delete.php" method="post">
		<input type="submit" value="削除する">
		<input type="hidden" name="id" value="<?=$row['id']?>">
	</form>

<hr><!-- 水平線 -->
<?php
}?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8";>
	<title></title>
</head>
<body>




</body>
</html>