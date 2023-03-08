<?php

class woo_base_MemApplicationRegistry extends woo_base_Registry {
   private static $instance;
   private $values=array();
   private $id;
   const DSN=1;

   private function __construct() {
      $this->id = @shm_attach(55, 10000, 0600);
      if ( ! $this->id ) {
         throw new Exception("��� ������� � ����� ������");
      }
   }

   static function instance() {
      if ( ! isset(self::$instance) ) {
         self::$instance = new self();
      }
      return self::$instance;
   }

   protected function get( $key ) {
      return shm_get_var( $this->id, $key );
   }

   protected function set( $key, $val ) {
      return shm_put_var( $this->id, $key, $val );
   }

   static function getDSN() {
      return self::instance()->get(self::DSN);
   }

   static function setDSN( $dsn ) {
      return self::instance()->set(self::DSN, $dsn);
   }
}


?>