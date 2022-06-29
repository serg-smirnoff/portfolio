<?php


class BooleanAndHandler implements gi_parse_Handler { 

   function handleMatch( gi_parse_Parser $parser,
                         gi_parse_Scanner $scanner ) {
      $comp1 = $scanner->getContext()->popResult();
      $comp2 = $scanner->getContext()->popResult();
      $scanner->getContext()->pushResult( 
          new BooleanAndExpression( $comp1, $comp2 ) );
   }
} 


?>