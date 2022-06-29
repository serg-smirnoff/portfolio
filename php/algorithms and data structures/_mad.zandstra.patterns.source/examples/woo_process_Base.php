<?php

abstract class woo_process_Base {
   static $DB;
   static $stmts = array();

   function __construct() {
      $dsn = woo_base_ApplicationRegistry::getDSN();
      if ( is_null( $dsn ) ) {
         throw new woo_base_AppException( "DSN �� �����" );
      }
      self::$DB = new PDO( $dsn );
      self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }

   function prepareStatement( $stmt_s ) {
      if ( isset( self::$stmts[$stmt_s] ) ) {
         return self::$stmts[$stmt_s];
      }
      $stmt_handle = self::$DB->prepare($stmt_s);
      self::$stmts[$stmt_s]=$stmt_handle;
      return $stmt_handle;
   }

   protected function doStatement( $stmt_s, $values_a ) {
      $sth = $this->prepareStatement( $stmt_s );
      $sth->closeCursor();
      $db_result = $sth->execute( $values_a );
      return $sth;
   }
}


?>