<?php
 require_once 'ShopProduct.php';
 require_once 'ShopProductWriter.php';
 require_once 'CDProduct.php';
 require_once 'BookProduct.php';

/* $product1 = new ShopProduct();
 $product2 = new ShopProduct();
 $product1->title="������� ������";
 $product2->title="�������";
 $product1->title             = "������� ������";
 $product1->producerMainName  = "��������";
 $product1->producerFirstName = "������";
 $product1->price             = 5.99;

$product1 = new ShopProduct( "������� ������",
                             "������", "��������", 5.99 );
$product2 = new ShopProduct( "��������� ��� �����",
                             "������", "���", 10.99 );
print "<pre>";
print "�����: "       . $product1->getProducer() . "\n";
print "�����������: " . $product2->getProducer() . "\n";
print "</pre>";


 print "<pre>";
 var_dump($product1);
// var_dump($product2);

 print $product1->title;
 print "<br>";
// print $product2->title;
// print "<br>";
 print "�����: {$product1->producerFirstName} "
            . "{$product1->producerMainName}\n";
 
 print "�����: {$product1->getProducer()}\n";

 print "�����: {$product1->getProducer()}\n";



 $settings = simplexml_load_file("settings.xml");
 $writer= new ShopProductWriter();
 $writer->write($product1); 
 print "</pre>";
*/

print "<pre>";
$product2 = new CDProduct( "��������� ��� �����",
                             "������", "���",
                            10.99, 62.33 );
print "�����������: {$product2->getProducer()}\n";
print "{$product2->getSummaryLine()}\n";
print "</pre>";


?>
