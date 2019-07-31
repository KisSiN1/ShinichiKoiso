<!doctype html>
<html>
<meta charset="utf-8">
<title></title>
</head>
<body>

<form method="POST" action="mission_2-1.php">
  <div>
    <input type="text" name="message" value="コメント">
  </div>
  <input type="submit"value="送信">
</form>

</body>
</html>

<?php
$message = $_POST['message'];
echo $message."を受け付けました";
?>
