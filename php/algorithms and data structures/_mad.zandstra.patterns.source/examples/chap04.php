<?php
// require_once 'ShopProduct.php';
// require_once 'CDProduct.php';
// require_once 'BookProduct.php';
// require_once 'StaticExample.php';
// require_once 'ShopProductWriter.php';

// require_once 'Runner.php';
// require_once 'Conf.php';
// require_once 'XmlException.php';

   require_once 'Person.php';
// require_once 'Account.php';
// require_once 'PersonWriter.php';



// class ErroredWriter extends ShopProductWriter{}
//  print "<pre>";
//  print StaticExample::$aNum;
//  print ShopProduct::AVAILABLE;
//  StaticExample::sayHello();
  

//  $dsn = "sqlite:products.db";
//  $pdo = new PDO( $dsn, null, null );
//  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//������ ������� products 

//  $query  = "DROP TABLE products";
//  $stmt   = $pdo->query( $query );

// �������� ������� ���� ������ products
//  $query  = file_get_contents( "products.sql" );
//  $stmt   = $pdo->query( $query );

// �������� �� �������

//  $query  = file_get_contents( "products_data_1.sql" );
//  $stmt   = $pdo->query( $query );

//  $query  = file_get_contents( "products_data_2.sql" );
//  $stmt   = $pdo->query( $query );

//  $obj = ShopProduct::getInstance( 2, $pdo );
//  var_dump($obj);
//  $writer = new ShopProductWriter();
//  print "</pre>";

//    Runner::Init();
   setLocale(LC_ALL, "ru_RU.CP1251");
//   $p = new Person();
//   $p->name = "����";
//
//   print $p->name;

// $person = new Person( new PersonWriter() );
// $person->name="����";
// $person->age=33;
// $person->writeName();

// $person = new Person( "����", 33 );
// $person->setId( 343 );
// unset( $person );

// class CopyMe {var $i=1,$t=123;}
// $first = new CopyMe();
// $second = clone $first;
// $second->i=5;
// print "<pre>";
// var_dump($first,$second);
// print "</pre>";
// � PHP 4 ���������� $second and $first ��������� �� 2 ������ �������
// ������� � PHP 5 ���������� $second and $first ��������� �� ���� ������

// $person = new Person( "����", 44 );
// $person->setId( 343 );
// $person2 = clone $person;
// print "<pre>";
// var_dump($person,$person2);
// print "</pre>";

// $person = new Person( "����", 44, new Account( 200 ) );
// $person->setId( 343 );
// $person2 = clone $person;
   // ������� $person ������� �����
// $person->account->balance += 10;
   // ��� ��������� ������ � $person2
// print $person->account->balance;
// print $person2->account->balance;

// class StringThing {}

// $st = new StringThing();
// print "<pre>";
// var_dump($st);
// print "</pre>";
//
// print $st;
  $person = new Person("����", 44);
  print $person;


?>