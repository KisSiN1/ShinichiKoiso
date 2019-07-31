<?php
  
//4-1 データベースへの接続
  $dsn = 'データベース名';
  $user = 'ユーザー名';
  $password = 'パスワード';
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
//テーブルを削除
  $sql ='DROP TABLES IF EXISTS tbtest';
  $stmt = $pdo -> query($sql);
//4-2 テーブル作成
  $sql = "CREATE TABLE IF NOT EXISTS tbtest"
  ." ("
  . "id INT AUTO_INCREMENT PRIMARY KEY,"
  . "name char(32),"
  . "comment TEXT"
  .");";
  $stmt = $pdo->query($sql);
//4-3 テーブル一覧を表示
  $sql ='SHOW TABLES';
  $result = $pdo -> query($sql);
  foreach ($result as $row){
          echo $row[0];
          echo '<br>';
  }
  echo "<hr>";
//4-4 テーブルの中身を確認
  $sql ='SHOW CREATE TABLE tbtest';
  $result = $pdo -> query($sql);
  foreach ($result as $row){
          echo $row[1];
  }
  echo "<hr>";
//4-5 データ入力
  $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
  $sql -> bindParam(':name', $name, PDO::PARAM_STR);
  $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
  $name = 'SiN';
  $comment = 'kangaroo';
  $sql -> execute();
//4-5(2)
  $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
  $sql -> bindParam(':name', $name, PDO::PARAM_STR);
  $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
  $name = 'シメイ';
  $comment = 'ヒヒョウ';
  $sql -> execute();
//4-5(3)
  $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
  $sql -> bindParam(':name', $name, PDO::PARAM_STR);
  $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
  $name = 'ネーム';
  $comment = 'メッセージ';
  $sql -> execute();
//4-7 編集
  $id = 1;
  $name = "ナマエ";
  $comment = "コメント";
  $sql = 'update tbtest set name=:name,comment=:comment where id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
//4-8 削除
  $id = 2;
  $sql = 'delete from tbtest where id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
//4-6  データの取得
  $sql = 'SELECT * FROM tbtest';
  $stmt = $pdo->query($sql);
  $results = $stmt->fetchAll();
  foreach ($results as $row){
          echo $row['id'].',';
          echo $row['name'].',';
          echo $row['comment'].'<br>';
  echo "<hr>";
  }
?>