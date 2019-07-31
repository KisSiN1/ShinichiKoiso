<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <form method="POST" action="mission_3-3.php">
    <div>
      名前<br><input type="text" name="name">
    </div>
    <div>
      コメント<br><textarea name="comment" value="コメント"></textarea>
    </div>
    <input type="submit"value="送信">
  </form>

  <form action="" method="POST">
    <div>
      削除番号<br><input type="text" name="deleteNo">
    </div>
    <input type="submit" name="delete" value="削除">
  </form>
</body>
</html>

<?php
  $filename = "mission_3-3.txt";
  $fp = fopen($filename,"a");
  if(file_exists($filename)){
    $count = count(file($filename))+1;
  } else {
          $count = 1;
}

  if(!empty($_POST['name']) && !empty($_POST['comment'])){
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $date = date("y/m/d H:i:s");
    fwrite($fp,$count."<>".$name."<>".$comment."<>".$date."<br>"."<>"."\r\n");
    fclose($fp);
          echo "名前とメッセージを送信しました<br>";
  }  else {
          echo "";
}
//空っぽでないとき
  if(!empty($_POST['delete'])){
  $delete = $_POST['deleteNo'];
//テキスト読み込み
  $delCon = file("mission_3-3.txt");
//ループ処理
  for($j = 0; $j < count($delCon); $j++){
//分解して投稿番号を取得
  $delData = explode("<>",$delCon[$j]);
//削除番号と投稿番号が一致したら
  if($delData[0] == $delete){
//削除
  array_splice($delCon,$j,1);
//データをファイルに書き込む
  file_put_contents($filename,implode($delCon));
  }
  }
}

  $file = file($filename);
  foreach($file as $value){
  $line = explode("<>",$value);
          echo $line[0];
          echo $line[1];
          echo $line[2];
          echo $line[3];
}
?>
