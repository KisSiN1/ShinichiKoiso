<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

  $filename = "mission_3-4.txt";
  $ediBango = "";
  $ediName = "";
  $ediComment = "";


  if(!empty($_POST['delete'])){
    $delete = $_POST['deleteNo'];
    $delCon = file($filename);
    for($i = 0; $i < count($delCon); $i++){
      $delData = explode("<>",$delCon[$i]);
      if($delData[0] == $delete){
        array_splice($delCon,$i,1);
        file_put_contents($filename,implode($delCon));
      }
    }
}
//POST送信 if文で処理を分岐
  if(!empty($_POST['edit'])){
    $edit = $_POST['editNo'];
    $ediCon = file($filename);
//ループ処理
    for($i = 0; $i < count($ediCon); $i++){
      if($ediCon == ""){
        continue;
      } else {
//分割して投稿番号を取得
          $ediData = explode("<>",$ediCon[$i]);
//比較して同じだったら
          if($ediData[0] == $edit){
//名前とコメントを取得
//番号を取得
            $ediBango = $ediData[0];
            $ediName = $ediData[1];
            $ediComment = $ediData[2];
            file_put_contents($filename,implode($ediCon));
          }
        }
    }
}


  if(!empty($_POST['send'])){
    if(file_exists($filename)){
      $count = count(file($filename))+1;
    } else {
        $count = 1;
      }
    $date = date("Y/m/d H:i:s");

    if(!empty($_POST['check'])){
      $check = $_POST['check'];
      $ediCon = @file($filename);
//      for($i = 0; $i < count($ediCon); $i++) {
      foreach((array)$ediCon as $key => $value){
        $ediData = explode("<>",$value);//ediCon[$i]);
        if($ediData[0] == $check) {
          $contents = $check."<>".$_POST['name']."<>".$_POST['comment']."<>".$date."<br>"."<>"."\r\n";
          array_splice($ediCon,$key,1,$contents);
        }
      }
      file_put_contents("mission_3-4.txt",$ediCon);
      echo "編集しました<br>";
    } else {
       $fp = fopen($filename,"a+");
       $contents = $count."<>".$_POST['name']."<>".$_POST['comment']."<>".$date."<br>"."<>"."\r\n";
       fwrite($fp,$contents);
       fclose($fp);
       echo "投稿しました<br>";
      }
}
//        echo "編集しました<br>";
//      }
//    }// else {
     //   $date = date("Y/m/d H:i:s");
     //   $contents = $count."<>".$_POST['name']."<>".$_POST['comment']."<>".$date."<br>"."<>"."\r\n";
     //   fwrite($fp,$contents);
     //   fclose($fp);
     //   echo "投稿しました";
     // }
//}
?>

  <form method="POST" action="mission_3-4-9.php">
      <input type="hidden" name="check" value="<?php echo $ediBango ?>"><!-- 編集番号を取得 --!>
    <div>
      名前<br>
      <input type="text" name="name" value="<?php echo $ediName; ?>"><!-- value属性にphp領域を指定 --!>
    </div>
    <div>
      コメント<br>
      <input type="text" name="comment" value="<?php echo $ediComment; ?>"><!-- value属性にphp領域を指定 --!>
      <input type="submit" name="send" value="送信">
    </div>

    <div>
      削除対象番号<br>
      <input type="text" name="deleteNo">
      <input type="submit" name="delete" value="削除">
    </div>

<!-- 編集番号指定用フォームを作る -->

    <div>
      編集対象番号<br>
      <input type="text" name="editNo">
      <input type="submit" name="edit" value="編集">
    </div>
  </form>

<?php
//送信
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