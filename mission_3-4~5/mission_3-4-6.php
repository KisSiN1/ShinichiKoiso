<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

  $filename = "mission_3-4.txt";
  $fp = fopen($filename,"a");
  $ediName = "";
  $ediComment = "";

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
//          echo "名前とメッセージを送信しました<br>";
//  }  else {
//          echo "";
}

  if(!empty($_POST['delete'])){
  $delete = $_POST['deleteNo'];
  $delCon = file("mission_3-4.txt");
  for($j = 0; $j < count($delCon); $j++){
  $delData = explode("<>",$delCon[$j]);
  if($delData[0] == $delete){
  array_splice($delCon,$j,1);
  file_put_contents($filename,implode($delCon));
  }
  }
}

//POST送信 if文で処理を分岐
  if(!empty($_POST['edit'])){
  $edit = $_POST['editNo'];
  $ediCon = file("mission_3-4.txt");
//ループ処理
  for($j = 0; $j < count($ediCon); $j++){
//分割して投稿番号を取得
  $ediData = explode("<>",$ediCon[$j]);
//比較して同じだったら
  if($ediData[0] == $edit){
//名前とコメントを取得
  $ediName = $ediData[1];
  $ediComment = $ediData[2];
  file_put_contents($filename,implode($ediCon));
  }
  }
}
?>

  <form method="POST" action="mission_3-4-6.php">
    <div>
      名前<br><input type="text" name="name" value="<?php echo $ediName; ?>"><!-- value属性にphp領域を指定 --!>
    </div>
    <div>
      コメント<br><input type="text" name="comment" value="<?php echo $ediComment; ?>"><!-- value属性にphp領域を指定 --!>
    </div>
    <input type="submit"value="送信">
    <div>
      削除対象番号<br><input type="text" name="deleteNo">
    </div>
    <input type="submit" name="delete" value="削除">
<!-- 編集番号指定用フォームを作る -->
    <div>
      編集対象番号<br><input type="text" name="editNo">
    </div>
    <input type="submit" name="edit" value="編集">
  </form>

<?php
//送信
  if(!empty($_POST['name']) && !empty($_POST['comment'])){
          echo "名前とメッセージを送信しました<br>";
  }  else {
          echo "";
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

</body>
</html>