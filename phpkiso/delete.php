<?php
// １．データベースに接続する
	//fetchの動きに注目上から順にとり、次の項目を取る準備をしてくれる
$dsn = 'mysql:dbname=otoiawase_form;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

// ２．SQL文を実行する
$sql= "DELETE FROM `survey` WHERE `survey`.`id` = 11";
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
