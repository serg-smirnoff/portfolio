<?php

class SecurityMonitor extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      if ( $status[0] == Login::LOGIN_WRONG_PASS ) {
         // �������� ����� ���������� ��������������
         print __CLASS__ . ":\t�������� ����� ���������� �������������� \n";
      }
   }
}

?>