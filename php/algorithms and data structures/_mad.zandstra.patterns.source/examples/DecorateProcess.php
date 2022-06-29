<?php

class RequestHelper{}

abstract class ProcessRequest {
   abstract function process( RequestHelper $req );
}

class MainProcess extends ProcessRequest {
   function process( RequestHelper $req ) {
      print __CLASS__ . ": ���������� ������� \n";
   }
}

abstract class DecorateProcess extends ProcessRequest {
   protected $processrequest;

   function __construct( ProcessRequest $pr ) {
      $this->processrequest = $pr;
   }
}


?>