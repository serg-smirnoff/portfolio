<?php
print "<pre>";

/*
$mapper = new woo_mapper_VenueMapper();
$venue = $mapper->find( 12 );
print_r( $venue );

$venue = new woo_domain_Venue();
$venue->setName( "The Likey Lounge" );

// ������� ������ � ���� ������
$mapper->insert( $venue );

// ����� ������ ������ - ������ ��� ��������, ��� ��� ��������!
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

// ������� ������
$venue->setName( "The Bibble Beer Likey Lounge" );

// ������� �������� ���������� ���������� ������
$mapper->update( $venue );

// � ����� ��������� � ���� ������, ����� ���������, ��� ��� ��������
$venue = $mapper->find( $venue->getId() );
print_r( $venue );



$venue = new woo_domain_Venue();
$venue->setName( "The Likey Lounge" );
$mapper->insert( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

$venue->setName( "The Bibble Beer Likey Lounge" );
$mapper->update( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

*/

$idobj = $factory->getIdentityObject()->field('name')
                 ->eq('The Eyeball Inn');
$collection = $finder->find( $idobj );
foreach ( $collection as $venue ) {
    print_r( $venue );
}






print "</pre>";


function __autoload( $classname ) {
   print $classname . "\n";
   include_once( "{$classname}.php" );
}


?>
