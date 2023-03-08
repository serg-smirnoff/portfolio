<?php

print "<pre>";

$lessons[] = new Seminar( 4, new TimedCostStrategy() );
$lessons[] = new Lecture( 4, new FixedCostStrategy() );

foreach ( $lessons as $lesson ) {
   print "������ �� ������� {$lesson->cost()}. ";
   print "��� ������: {$lesson->chargeType()}\n";
}


print "</pre>";


function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

?>
