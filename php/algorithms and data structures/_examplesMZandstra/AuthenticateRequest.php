<?php

class AuthenticateRequest extends DecorateProcess {
   function process( RequestHelper $req ) {
      print __CLASS__.": �������������� ������� \n";
      $this->processrequest->process( $req );
   }
}

?>