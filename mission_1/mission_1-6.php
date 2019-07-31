<?php
//変数に代入する
  $year_start = 2000;
  $year_now = 2019;
//for文を使って、2000年以降から現在まで、4年加算してブラウザ表示する
  for ( $i=$year_start ; $i<= $year_now ; $i=$i+4 ){
          echo $i."<br>";
  }
?>

<?php
//3つ目に代入した言葉だけをブラウザ表示する
  $Shiritori = array("しりとり","りんご","ごりら","らっぱ","ぱんだ");
  echo $Shiritori[2];
?><br>

<?php
  $ankiword ="";
  $Shiritori = array("しりとり","りんご","ごりら","らっぱ","ぱんだ");
  foreach ($Shiritori as $word) {
          $ankiword = $ankiword . $word;
          echo $ankiword . "<br>";
  }