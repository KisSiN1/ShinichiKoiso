<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

  $filename = "mission_3-5.txt";
  $ediBango = "";
  $ediName = "";
  $ediComment = "";

//削除機能
  if(!empty($_POST['delete'])){
//パスワードが入力されていたら
    if(!empty($_POST['delPass'])){
      $delete = $_POST['deleteNo'];
      $pass = $_POST['delPass'];
//ファイル呼び出し
      $delCon = file($filename);
//ループ処理
      for($i = 0; $i < count($delCon); $i++){
//分割して投稿番号を取得
        $delData = explode("<>",$delCon[$i]);
//削除番号と比較して一致したら
        if($delData[0] == $delete){
//その行を削除
          array_splice($delCon,$i,1);
//書き込み
          file_put_contents($filename,implode($delCon));
        }
      }
//パスワードが入力されていない時
    } else {
        echo "パスワードを入力してください<br>";
      }
}

//編集選択
//POST送信 if文で処理を分岐
  if(!empty($_POST['edit'])){
//パスワード確認
    if(!empty($_POST['ediPass'])){
      $edit = $_POST['editNo'];
      $pass = $_POST['ediPass'];
//ファイル呼び出し
      $ediCon = file($filename);
//ループ処理
      foreach((array)$ediCon as $key => $value){
        if($ediCon == ""){
          continue;
        } else {
//分割して投稿番号を取得
            $ediData = explode("<>",$value);
//編集対象番号と比較して一致したら
            if($ediData[0] == $edit){
//名前とコメントを取得
//編集データを取得
              $ediBango = $ediData[0];
              $ediName = $ediData[1];
              $ediComment = $ediData[2];
            }
          }
      }
//パスワードが入力されていない時
    } else {
        echo "パスワードを入力してください<br>";
      }
}

//送信ボタンが押された時
  if(!empty($_POST['send'])){
//パスワード確認
    if(!empty($_POST['comPass'])){
      $pass = $_POST['comPass'];
//番号の取得
      if(file_exists($filename)){
        $count = count(file($filename))+1;
      } else {
          $count = 1;
        }
      $date = date("Y/m/d H:i:s");

//編集機能
//編集番号が送信された時
      if(!empty($_POST['check'])){
        $check = $_POST['check'];
//ファイル呼び出し
        $ediCon = @file($filename);
//ループ処理
        foreach((array)$ediCon as $key => $value){
//文字の分割
          $ediData = explode("<>",$value);
//編集番号と一致したら
          if($ediData[0] == $check) {
//投稿データ
            $contents = $check."<>".$_POST['name']."<>".$_POST['comment']."<>".$date."<>".$_POST['comPass']."<>"."\r\n";
//その行を上書き
            array_splice($ediCon,$key,1,$contents);
          }
        }
//上書き
        file_put_contents("mission_3-5.txt",$ediCon);
        echo "編集しました<br>";
//編集番号と一致しない時
      } else {
//新規投稿
          $fp = fopen($filename,"a+");
          $contents = $count."<>".$_POST['name']."<>".$_POST['comment']."<>".$date."<>".$_POST['comPass']."<>"."\r\n";
          fwrite($fp,$contents);
          fclose($fp);
          echo "投稿しました<br>";
        }
//パスワードがない時
    } else {
        echo "パスワードを入力してください<br>";
      }
}
?>

  <form method="POST" action="mission_3-5.php">
      <input type="hidden" name="check" value="<?php echo $ediBango ?>"><!-- 編集番号を取得 --!>
    <div>
      <input type="text" name="name" value="<?php echo $ediName; ?>">名前<br> <!-- value属性にphp領域を指定 --!>
    </div>
    <div>
      <input type="text" name="comment" value="<?php echo $ediComment; ?>">コメント<br> <!-- value属性にphp領域を指定 --!>
      <input type="password" name="comPass">パスワード<br>
      <input type="submit" name="send" value="送信">
    </div>

    <div>
      <input type="text" name="deleteNo">削除対象番号<br>
      <input type="password" name="delPass">パスワード<br>
      <input type="submit" name="delete" value="削除">
    </div>

<!-- 編集番号指定用フォームを作る -->

    <div>
      <input type="text" name="editNo">編集対象番号<br>
      <input type="password" name="ediPass">パスワード<br>
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
          echo "<br>";
}
?>

</body>
</html>