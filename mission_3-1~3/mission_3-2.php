<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <form method="POST" action="mission_3-2.php">
    <div>
      名前<br>
      <input type="text" name="name">
    </div>
    <div>
      コメント<br>
      <textarea name="comment" value="コメント"></textarea>
    </div>
    <input type="submit"value="送信">
  </form>
</body>
</html>

<?php
  $filename = "mission_3-2.txt";
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
  $file = file($filename);
  foreach($file as $value){
  $line = explode("<>",$value);
          echo $line[0];
          echo $line[1];
          echo $line[2];
          echo $line[3];
  }
?>
