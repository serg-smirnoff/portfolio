<?php

class PartnershipTool extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      // �������� IP-�����
      // �������� cookie-����, ���� ����� ������������� ������
      print __CLASS__ . ":\t�������� cookie-�����, ���� ����� ������������� ������\n";
   }
}

?>