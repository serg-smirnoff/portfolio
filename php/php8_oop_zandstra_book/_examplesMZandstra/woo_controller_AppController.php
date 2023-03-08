<?php

class woo_controller_AppController {
   private static $base_cmd;
   private static $default_cmd;
   private $controllerMap;
   private $invoked = array();

   function __construct( woo_controller_ControllerMap $map ) {
      $this->controllerMap = $map;
      if ( ! self::$base_cmd ) {
         self::$base_cmd = new ReflectionClass( "woo_command_Command" );
         self::$default_cmd = new woo_command_DefaultCommand();
      }
   }

   function getView( woo_controller_Request $req ) {
      $view = $this->getResource( $req, "View" );
      return $view;
   }

   function getForward( woo_controller_Request $req ) {
      $forward = $this->getResource( $req, "Forward" );
      if ( $forward ) {
         $req->setProperty( 'cmd', $forward );
      }
      return $forward;
   }

   private function getResource( woo_controller_Request $req, $res ) {
   // ��������� ���������� ������� � �� ��� ��������� 
      $cmd_str = $req->getProperty( 'cmd' );
      $previous = $req->getLastCommand();
       $status = $previous->getStatus();
       if (! $status ) { $status = 0; }
       $acquire = "get$res";

   // ��������� ������ ��� ���������� ������� � �� ���� ���������
       $resource = $this->controllerMap->$acquire($cmd_str, $status );

   // ��������� �������������� ������ ��� ������� � ���� ��������� 0
       if ( ! $resource ) {
          $resource = $this->controllerMap->$acquire( $cmd_str, 0 );
       }

   // ���� ��� ������� 'default' � �������� ���� ���������
       if ( ! $resource ) {
          $resource = $this->controllerMap->$acquire( 'default', $status );
       }

   // ���� ������ �� ������� ��������� ������ ��� ������� 'default', 
   // � ���� ��������� 0
      if ( ! $resource ) {
         $resource = $this->controllerMap->$acquire( 'default', 0 );
      }
      return $resource;
   }

   function getCommand( woo_controller_Request $req ) {
      $previous = $req->getLastCommand();
      if ( ! $previous ) {
      // ��� ������ ������� �������� ������� 
         $cmd = $req->getProperty('cmd');
         if ( ! $cmd ) {
         // �������� 'cmd' �� ���������, ���������� 'default'
            $req->setProperty('cmd', 'default' );
            return self::$default_cmd;
         }
       } else {
         // ������� ��� �������� � ������� ������� 
            $cmd = $this->getForward( $req );
            if ( ! $cmd ) { return null; }
       }
      // ����� � ���������� $cmd ��������� ��� �������
      // ����������� ��� � ������ ���� Command 
      $cmd_obj = $this->resolveCommand( $cmd );
      if ( ! $cmd_obj ) {
         throw new woo_base_AppException(
                "������� '$cmd' �� �������" );
      }
      $cmd_class = get_class( $cmd_obj );
      $this->invoked[$cmd_class]++;
      if ( $this->invoked[$cmd_class] > 1 ) {
         throw new woo_base_AppException( "����������� �����" );
      }
      // ���������� ������ ���� Command
      return $cmd_obj;
   }

   function resolveCommand( $cmd ) {
      $cmd=str_replace( array('.','/'), "", $cmd );
      $classroot = $this->controllerMap->getClassroot( $cmd );
      $filepath = "woo/command/$classroot.php";
      $classname = "woo_command_$classroot";
      if ( file_exists( $filepath ) ) {
         require_once( "$filepath" );
         if ( class_exists( $classname) ) {
            $cmd_class = new ReflectionClass($classname);
               if ( $cmd_class->isSubClassOf( self::$base_cmd ) ) {
                  return $cmd_class->newInstance();
               }
         }
      }
      return null;
   }
}



?>