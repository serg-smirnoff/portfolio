<?php

class BloggsCommsManager extends CommsManager {

   function getHeaderText() {
      return "BloggsCal ������� ����������\n";
   }

   function getApptEncoder() {
      return new BloggsApptEncoder();
   }

   function getFooterText() {
      return "BloggsCal ������ ����������\n";
   }
}

?>