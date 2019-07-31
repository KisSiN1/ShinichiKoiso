<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <form method="POST" action="mission_3-4-2.php">
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
      削除対象番号<br><input type="text" name="deleteNo">
    </div>
    <input type="submit" name="delete" value="削除">
<!-- 編集番号指定用フォームを作る -->
    <div>
      編集対象番号<br><input type="text" name="edit">
    </div>
    <input type="submit" value="編集">
  </form>
</body>
</html>

<?php
  $filename = "mission_3-4.txt";
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

  if(!empty($_POST['delete'])){
  $delete = $_POST['deleteNo'];
  $delCon = file("mission_3-3.txt");
  for($j = 0; $j < count($delCon); $j++){
  $delData = explode("<>",$delCon[$j]);
  if($delData[0] == $delete){
  array_splice($delCon,$j,1);
  file_put_contents($filename,implode($delCon));
  }
  }
}
//POST送信 if文で処理を分岐
  if(!empty($_POST['$edit'])){
  $edit = $_POST['$edit'];
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