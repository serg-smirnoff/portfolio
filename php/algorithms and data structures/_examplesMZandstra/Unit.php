<?php

/*
abstract class Unit {
   abstract function addUnit   ( Unit $unit );
   abstract function removeUnit( Unit $unit );
   abstract function bombardStrength();
}

*/

/*
abstract class Unit {
   abstract function bombardStrength();

   function addUnit( Unit $unit ) {
      throw new UnitException( get_class($this) . " ��������� � '�������'");
   }

   function removeUnit( Unit $unit ) {
      throw new UnitException( get_class($this) . " ��������� � '�������'");
   }
}
*/

abstract class Unit {
   protected $depth;

   function getComposite() {
      return null;
   }
   abstract function bombardStrength();

   function textDump( $num=0 ) {
      $ret  = "";
      $pad  = 4*$num;
      $ret .= sprintf( "%{$pad}s", "" );
      $ret .= get_class($this) . ": ";
      $ret .= "������� ����: " . $this->bombardStrength() . "\n";
      return $ret;
   }

   function accept( ArmyVisitor $visitor ) {
      $method = "visit" . get_class( $this );
      $visitor->$method( $this );
   }

   protected function setDepth( $depth ) {
      $this->depth=$depth;
   }

   function getDepth() {
      return $this->depth;
   }

}


?>