<?php
print "<pre>";

/*
$_REQUEST['form_input']="print file_get_contents('/etc/passwd');";

$form_input = $_REQUEST['form_input'];
// ��������: "print file_get_contents('/etc/passwd');"
eval( $form_input );
*/

/*
$context = new InterpreterContext();
$literal = new LiteralExpression( '������');
$literal->interpret( $context );
print $context->lookup( $literal ) . "\n";
*/

/*
$context = new InterpreterContext();
$myvar = new VariableExpression( 'input', '������');
$myvar->interpret( $context );
print $context->lookup( $myvar ). "\n";
// ���������: '������'

$newvar = new VariableExpression( 'input' );
$newvar->interpret( $context );
print $context->lookup( $newvar ). "\n";
// ���������: '������'

$myvar->setValue("����");
$myvar->interpret( $context );
print $context->lookup( $myvar ). "\n";
// ���������: '����'
print $context->lookup( $newvar ) . "\n";
// ���������: '����'

*/

/*
$context = new InterpreterContext();
$input = new VariableExpression( 'input' );
$statement = new BooleanOrExpression(
   new EqualsExpression($input, new LiteralExpression( '������' ) ),
   new EqualsExpression($input, new LiteralExpression( '4' ) )
);


foreach ( array( "������", "4", "52" ) as $val ) {
   $input->setValue( $val );
   print "$val:\n";
   $statement->interpret( $context );
   if ( $context->lookup( $statement ) ) {
      print "�������������\n\n";
   } else {
      print "�� �������������\n\n";
   }
}
*/

/*
$markers = array( new RegexpMarker( "/�.��/" ),
                  new MatchMarker( "����" ),
                  new MarkLogicMarker( '$input equals "����"' )
                );
foreach ( $markers as $marker ) {
   print get_class( $marker ) . "\n";
   $question = new TextQuestion( "������� ����� � ����������� ������?", $marker );
   foreach ( array( "����", "������" ) as $response ) {
      print "\t�����: $response: ";
      if ( $question->mark( $response ) ) {
         print "���������! \n";
      } else {
         print "�������! \n";
      }
   }
}

*/

/*
$login = new Login();
$login->attach( new SecurityMonitor() );

*/

/*
$login = new Login();
new SecurityMonitor( $login );
new GeneralLogger( $login );
new PartnershipTool( $login );

var_dump($login);
*/

/*
$main_army = new Army();
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );
$main_army->addUnit( new Cavalry() );
$textdump = new TextDumpArmyVisitor();
$main_army->accept( $textdump );
print $textdump->getText();
*/


/*
$main_army = new Army();
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );
$main_army->addUnit( new Cavalry() );
$taxcollector = new TaxCollectionVisitor();
$main_army->accept( $taxcollector );
print $taxcollector->getReport() . "\n";
print "�����: ";
print $taxcollector->getTax() . "\n";
*/

$controller = new Controller();
// ��������� ������ ������������
$context = $controller->getContext();
$context->addParam('action', 'login' );
$context->addParam('username', 'bob' );
$context->addParam('pass', 'tiddles' );
$controller->process();




print "</pre>";


function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}


?>
