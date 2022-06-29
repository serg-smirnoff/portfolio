<?php
class Runner {
   static function init() {
      try {
          $conf = new Conf( dirname(__FILE__) . "/conf.xml" );
          print "<pre>";	
          print "user: " . $conf->get('user') . "\n";
          print "host: " . $conf->get('host') . "\n";
          print "</pre>";	
          $conf->set("pass", "newpass");
          $conf->write();
      } catch ( FileException $e ) {
        // ���� �� ���������� ���� ���������� ��� ������
        print "���� �� ���������� ���� ���������� ��� ������";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 


      } catch ( XmlException $e ) {
        // ������������ XML-����
         print "������������ XML-����"; 
	 print "<pre>";	 
	 var_dump($e);
	 print "</pre>";	 

      } catch ( ConfException $e ) {
        // ������������ ������ XML-�����
         print "������������ ������ XML-�����";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 


      } catch ( Exception $e ) {
        // ������������: ���� ��� �� ������ ������� ����������
         print "������������: ���� ��� �� ������ ������� ����������";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 

      }
   }
}
?>