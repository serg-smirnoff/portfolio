<?php

class Person {
   public  $name;
   private $age;
   private $id;
   public $account;

   function __construct( $name, $age=0 ) {
      $this->name = $name;
      $this->age = $age;
   }

// function __construct( $name, $age, Account $account ) {
//    $this->name = $name;
//    $this->age = $age;
//    $this->account = $account;
// }

   function __toString() {
      $desc  = $this->getName();
      $desc .= " (������� " . $this->getAge() . " ���)";
      return $desc;
   }
  

   function __clone() {
      $this->id = 0;
      $this->account = clone $this->account;
   }


   function setId( $id ) {
      $this->id = $id;
   }

   function getName() {
      return $this->name;
   }

   function getAge() {
      return $this->age;
   }

   function __destruct() {
      if ( ! empty( $this->id ) ) {
      // �������� ������ ������� Person
      print "���������� ������� person<br />\n";
      }
   }
}
?>