<?php
   try {
      $venues = woo_domain_Venue::findAll();
   } catch ( Exception $e ) {
      include( 'error.php' );
      exit(0);
   }

// ����������� �������� ����������� ����
?>

<html>
   <head>
      <title>���������</title>
   </head>

   <body>
      <h1>���������</h1>
<?php foreach( $venues as $venue ) { ?>
<?php    print $venue->getName(); ?> <br />
<?php } ?>
   </body>
</html>
