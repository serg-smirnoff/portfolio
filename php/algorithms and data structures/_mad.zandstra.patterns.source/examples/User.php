<?php

class User {
   private $name;
   private $mail;
   private $pass;
   private $failed;

   function __construct( $name, $mail, $pass ) {
      if ( strlen( $pass ) < 5 ) {
         throw new Exception(
            "����� ������ ������ ���� �� ����� 5 ��������.");
      }
      $this->name = $name;
      $this->mail = $mail;
      $this->pass = $pass;
   }

   function getMail() {
      return $this->mail;
   }

   function getPass() {
      return $this->pass;
   }

   function failed( $time ) {
      $this->failed = $time;
   }
}



?>