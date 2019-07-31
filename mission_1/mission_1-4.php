<?php
  $thisyear = 2019;
  $mybirth = 1998;
//今年から生まれ年を引いた値をブラウザ表示する
  echo $thisyear - $mybirth,"<br>" ;
//干支で一回り(12歳)上の方の年齢を加算、ブラウザ表示する
  echo 20 + 12,"<br>";
//二回り上の方の年齢を加算と乗算で算出し、ブラウザ表示する
  echo 20 + 12 * 2,"<br>";
//今年から生まれ年を除算で求めてブラウザ表示する
  echo ($thisyear - $mybirth) / 4,"<br>";
//%で余りを求める
  $amari = ($thisyear - $mybirth) % 4;
//余りを引いた上で除算する
  echo ($thisyear - $mybirth - $amari) / 4,"<br>";
 ?>