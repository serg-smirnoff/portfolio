<?php

print "<pre>";

//$boss = new NastyBoss();
//$boss->addEmployee( "�����" );
//$boss->addEmployee( "��������" );
//$boss->addEmployee( "�����" );
//$boss->projectFails();

//$boss = new NastyBoss();
//$boss->addEmployee( new Minion( "�����" ) );
//$boss->addEmployee( new CluedUp( "��������" ) );
//$boss->addEmployee( new Minion( "�����" ) );
//$boss->projectFails();
//$boss->projectFails();
//$boss->projectFails();

//$boss = new NastyBoss();
//$boss->addEmployee( Employee::recruit( "�����" ) );
//$boss->addEmployee( Employee::recruit( "��������" ) );
//$boss->addEmployee( Employee::recruit( "�����" ) );
//$boss->projectFails();
//$boss->projectFails();
//$boss->projectFails();

//$pref = Preferences::getInstance();
//$pref->setProperty( "name", "����" );

//unset( $pref ); // ������ ������

//$pref2 = Preferences::getInstance();
// ��������, ��� ����� ������������� �������� ���������
//print $pref2->getProperty( "name" ) . "\n"; 


//$comms = new CommsManager( CommsManager::MEGA );
//$comms = new BloggsCommsManager();
//$apptEncoder = $comms->getApptEncoder();
//print $apptEncoder->encode();


//$factory = new TerrainFactory( new EarthSea(),
//                               new EarthPlains(),
//                               new EarthForest() );

//$factory = new TerrainFactory( new EarthSea( -1 ),
//                               new EarthPlains(),
//                               new EarthForest() );

//print_r( $factory->getSea() );
//print_r( $factory->getPlains() );
//print_r( $factory->getForest() );


$commsMgr = AppConfig::getInstance()->getCommsManager();
print $commsMgr->getApptEncoder()->encode();




print "</pre>";

function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

?>