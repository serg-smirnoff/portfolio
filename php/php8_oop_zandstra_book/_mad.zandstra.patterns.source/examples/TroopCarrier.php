<?php

class TroopCarrier extends CompositeUnit {
   function addUnit( Unit $unit ) {
      if ( $unit instanceof Cavalry ) {
         throw new UnitException(
                   "������ �������� ������ �� ������������ ��������");
      }
      super::addUnit( $unit );
   }

   function bombardStrength() {
      return 0;
   }
}

?>