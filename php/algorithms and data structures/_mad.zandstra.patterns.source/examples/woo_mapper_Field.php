<?php

class woo_mapper_Field {
   protected $name=null;
   protected $operator=null;
   protected $comps=array();
   protected $incomplete=false;

   // ������������� ��� ����, �������� age
   function __construct( $name ) {
      $this->name = $name;
   }

  // ��������� �������� � �������� ��� ������������ 
  // (> 40, ��������) � �������� ��� � �������� $comps 
  function addTest( $operator, $value ) {
     $this->comps[] = array( 'name' => $this->name,
                         'operator' => $operator,
                            'value' => $value );
   }

   // $comps - ��� ������, ������� �� ����� �������� ���� ���� � ������
   //   ����������� ��������� 
   function getComps() { return $this->comps; }
   // ���� ������ $comps �� �������� ���������, ������ � ��� ����
   // ������ ��� ��������� � ��� ���� �� ������ ��� �������������
   // � �������
   function isIncomplete() { return empty( $this->comps); }
}


?>