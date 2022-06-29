<?php

class CommandNotFoundException extends Exception {}

class CommandFactory {
//   private static $dir = 'commands';
     private static $dir = '.';

   static function getCommand( $action='Default' ) {
      if ( preg_match( '/\W/', $action ) ) {
         throw new Exception("������������ ������� � �������");
      }
      $class = UCFirst(strtolower($action)) . "Command";
      $file  = self::$dir . DIRECTORY_SEPARATOR . "{$class}.php";
      if ( ! file_exists( $file ) ) {
         throw new CommandNotFoundException( "���� '$file' �� ������" );
      }
      require_once( $file );
      if ( ! class_exists( $class ) ) {
         throw new CommandNotFoundException( "����� '$class' �����������" );
      }
      $cmd = new $class();
      return $cmd;
   }
}

?>