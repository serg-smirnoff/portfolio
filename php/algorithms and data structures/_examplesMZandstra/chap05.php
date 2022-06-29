<?php
  print "<pre>";
//  print_r( get_declared_classes() );
//  var_dump( get_declared_classes() );

   $product = getProduct();
//   var_dump($product);
// if ( get_class( $product ) == 'CDProduct' ) {
//    print "\$product -- ������ ������ CDProduct\n";
// }
//
// if ( $product instanceof ShopProduct ) {
//    print "\$product -- ������ ���� ShopProduct\n";
// }
//
// if ( is_subclass_of( $product, 'ShopProduct' ) ) {
//    print "CDProduct �������� ���������� ������ ShopProduct\n";
// }
//
// $method = "getSummaryLine";      // ��������� ��� ������
// print $product->$method() . "\n"; // ������� �����

//  $prod_class = new ReflectionClass( 'CDProduct' );
    $prod_class = new ReflectionClass( 'PersonWriter' );

//  Reflection::export( $prod_class );
//  print classData( $prod_class );
//  print ReflectionUtil::getClassSource($prod_class);

//  print_r( get_class_methods( 'CDProduct' ) );
//  print_r( get_class_methods( $product ) );
//  print_r( get_declared_classes() );
//  print_r( get_class_vars( 'CDProduct' ) );
//  print get_parent_class( 'CDProduct' );

//    $methods = $prod_class->getMethods();
//    foreach ( $methods as $method ) {
//       print methodData( $method );
//       print "\n----\n";
//    }

//     $method = $prod_class->getMethod( 'getSummaryLine' );
//     print ReflectionUtil::getMethodSource( $method );

//     $method = $prod_class->getMethod( "__construct" );
//     $method = $prod_class->getMethod( "writeName" );
//     print ReflectionUtil::getMethodSource( $method );
//     $params = $method->getParameters();
//
//     foreach ( $params as $param ) {
//        print argData( $param );
//     }
//
      $test = new ModuleRunner();
      $test->init();


  print "</pre>";

  exit();

/********************************************************/
function getProduct() {
   return new CDProduct( "��������� ��� �����",
                             "������", "���",
                            10.99, 60.33 );
}

function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

function classData( ReflectionClass $class ) {
   $details = "";
   $name = $class->getName();
   if ( $class->isUserDefined() ) {
      $details .= "$name -- ����� ��������� �������������\n";
   }
   if ( $class->isInternal() ) {
      $details .= "$name -- ���������� �����\n";
   }
   if ( $class->isInterface() ) {
      $details .= "$name -- ��� ���������\n";
   }
   if ( $class->isAbstract() ) {
      $details .= "$name -- ��� ����������� �����\n";
   }
   if ( $class->isFinal() ) {
      $details .= "$name -- ��� ����������� �����\n";
   }
   if ( $class->isInstantiable() ) {
      $details .= "$name -- ����� ������� ��������� ������\n";
   } else {
      $details .= "$name -- ������ ������� ��������� ������\n";
   }
   return $details;
}

function methodData( ReflectionMethod $method ) {
   $details = "";
   $name = $method->getName();
   if ( $method->isUserDefined() ) {
      $details .= "$name -- ����� ��������� �������������\n";
   }
   if ( $method->isInternal() ) {
      $details .= "$name -- ���������� �����\n";
   }
   if ( $method->isAbstract() ) {
      $details .= "$name -- ����������� �����\n";
   }
   if ( $method->isPublic() ) {
      $details .= "$name -- ������������� �����\n";
   }
   if ( $method->isProtected() ) {
      $details .= "$name -- ���������� �����\n";
  }
   if ( $method->isPrivate() ) {
      $details .= "$name -- �������� �����\n";
   }
   if ( $method->isStatic() ) {
      $details .= "$name -- ����������� �����\n";
   }
   if ( $method->isFinal() ) {
      $details .= "$name -- ����������� �����\n";
   }
   if ( $method->isConstructor() ) {
      $details .= "$name -- ����� ������������\n";
   }
   if ( $method->returnsReference() ) {
      $details .= "$name -- ����� ���������� ������, � �� ��������\n";
   }
   return $details;
}

function argData( ReflectionParameter $arg ) {
   $details = "";
   $name  = $arg->getName();
   $class = $arg->getClass();
   if ( ! empty( $class ) ) {
      $classname = $class->getName();
      $details .= "\$$name ������ ���� �������� ���� $classname\n";
   }
   if ( $arg->isPassedByReference() ) {
      $details .= "\$$name ������� �� ������\n";
   }
   return $details;
}


?>