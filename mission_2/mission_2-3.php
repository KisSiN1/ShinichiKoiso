<!doctype html>
<html>
<meta charset="utf-8">
<title></title>
</head>
<body>

<form method="POST" action="mission_2-3.php">
  <div>
    <input type="text" name="message" value="コメント">
  </div>
  <input type="submit"value="送信">
</form>

</body>
</html>

<?php
//パラメータ"a"でfopenする
  $filename = "mission_2-3.txt";
  $fp = fopen($filename,"a");
  $content = file_get_contents($filename);
  if(empty($_POST['message'])){
          echo "";
  } elseif ($_POST['message'] == "完成"){
      $message = $_POST['message'];
      fwrite($fp, $message ."<br>" ."\r\n");
      fclose($fp);
          echo $message."を受け付けました<br>";
          echo "おめでとう";
          echo $content;
  } else {
      $message = $_POST['message'];
      fwrite($fp, $message ."<br>" ."\r\n");
      fclose($fp);
          echo $message."を受け付けました<br>";
          echo $content;
  }
?>