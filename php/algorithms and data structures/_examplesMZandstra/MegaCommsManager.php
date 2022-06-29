<?php

class MegaCommsManager extends CommsManager {

   function getHeaderText() {
      return "MegaCal ������� ����������\n";
   }

   function getApptEncoder() {
      return new MegaApptEncoder();
   }

   function getFooterText() {
      return "MegaCal ������ ����������\n";
   }
}

?>