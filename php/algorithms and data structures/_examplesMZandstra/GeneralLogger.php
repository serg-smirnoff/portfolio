<?php

class GeneralLogger extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      // �������������� ����������� � �������
      print __CLASS__ . ":\t����������� � ��������� �������\n";
   }
}

?>
