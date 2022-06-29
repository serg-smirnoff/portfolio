<?php

class woo_controller_ApplicationHelper {
   private static $instance;
   private $config = "woo_options.xml";

   private function __construct() {}

   static function instance() {
      if ( ! self::$instance ) {
         self::$instance = new self();
      }
      return self::$instance;
   }

   function init() {
      $dsn = woo_base_ApplicationRegistry::getDSN( );
         if ( ! is_null( $dsn ) ) {
            return;
      }
      $this->getOptions();
}

   private function getOptions() {
      $this->ensure( file_exists( $this->config ),
                      "���� ������������ �� ������" );
      $options = @simplexml_load_file( $this->config );
      $this->ensure( $options instanceof SimpleXMLElement,
                       "���� ������������ ��������" );
      $dsn = (string)$options->dsn;
      $this->ensure( $dsn, "DSN �� ������" );
      woo_base_ApplicationRegistry::setDSN( $dsn );
     // ���������� ������ �������� 
   }

   private function ensure( $expr, $message ) {
      if ( ! $expr ) {
         throw new woo_base_AppException( $message );
      }
   }
}


?>