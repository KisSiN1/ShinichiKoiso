<?php
  $thisyear = 2019;
  $mybirth = 1998;
//���N���琶�܂�N���������l���u���E�U�\������
  echo $thisyear - $mybirth,"<br>" ;
//���x�ň���(12��)��̕��̔N������Z�A�u���E�U�\������
  echo 20 + 12,"<br>";
//�����̕��̔N������Z�Ə�Z�ŎZ�o���A�u���E�U�\������
  echo 20 + 12 * 2,"<br>";
//���N���琶�܂�N�����Z�ŋ��߂ău���E�U�\������
  echo ($thisyear - $mybirth) / 4,"<br>";
//%�ŗ]������߂�
  $amari = ($thisyear - $mybirth) % 4;
//�]�����������ŏ��Z����
  echo ($thisyear - $mybirth - $amari) / 4,"<br>";
 ?>