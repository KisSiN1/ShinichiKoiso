<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <form method="POST" action="mission_3-1.php">
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
  $filename = "mission_3-1.txt";
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
    fwrite($fp,$count."<>".$name."<>".$comment."<>".$date."<>"."<br>"."\r\n");
    fclose($fp);
          echo "名前とコメントを送信しました<br>";
  }  else {
          echo "";
}
  $content = file_get_contents($filename);
  foreach((array)$content as $line){
          echo $line;
  }
?>
