<!doctype html>
<html>
<meta charset="utf-8">
<title></title>
</head>
<body>

<form method="POST" action="mission_2-2.php">
  <div>
    <input type="text" name="message" value="コメント">
  </div>
  <input type="submit"value="送信">
</form>

</body>
</html>

<?php
      $filename = "mission_2-2.txt";
      $fp = fopen($filename,"w");
      $content = file_get_contents($filename);
  if(empty($_POST['message'])){
          echo "";
  } elseif ($_POST['message'] == "完成"){
      $message = $_POST['message'];
      fwrite($fp, $message);
      fclose($fp);
          echo $message."を受け付けました<br />";
          echo "おめでとう";
  } else {
      $message = $_POST['message'];
      fwrite($fp, $message);
      fclose($fp);
          echo $message."を受け付けました<br />";
          echo $content;
  }
?>