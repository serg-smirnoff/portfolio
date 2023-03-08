<?php

/*

class woo_mapper_IdentityObject {
   private $name = null;

   function setName( $name ) {
      $this->name=$name;
   }

   function getName() {
      return $this->name;
   }
}

*/

class woo_mapper_IdentityObject {
   protected $currentfield=null;
   protected $fields = array();
   private $and=null;
   private $enforce=array();

   // ����������� identity object ����� ����������� 
   // ��� ���������� ��� � ������ ����
   function __construct( $field=null, array $enforce=null ) {
      if ( ! is_null( $enforce ) ) {
         $this->enforce = $enforce;
      }
      if ( ! is_null( $field ) ) {
         $this->field( $field );
      }
   }

   // ����� �����, ��� ������� �������� ��� �����������
   function getObjectFields() {
      return $this->enforce;
   }

   // ������ ����� ����.
   // ������������ ������, ���� ������� ���� ��������
   // (�.�. age, � �� age > 40).
   // ���� ����� ���������� ������ �� ������� ������,
   // � ��� ����� ��������� ��������� ���������
   function field( $fieldname ) {
      if ( ! $this->isVoid() && $this->currentfield->isIncomplete() ) {
         throw new Exception("�������� ����");
      }
      $this->enforceField( $fieldname );
      if ( isset( $this->fields[$fieldname] ) ) {
          $this->currentfield=$this->fields[$fieldname];
      } else {
          $this->currentfield = new woo_Mapper_Field( $fieldname );
          $this->fields[$fieldname]=$this->currentfield;
      }
      return $this;
   }

   // ���� �� ��� ���� � identity object
   function isVoid() {
      return empty( $this->fields );
   }

   // �������� ��� ���� ���������?
   function enforceField( $fieldname ) {
      if ( ! in_array( $fieldname, $this->enforce ) &&
           ! empty( $this->enforce ) ) {
         $forcelist = implode( ', ', $this->enforce );
          throw new Exception("{$fieldname} �� �������� ���������� ����� ($forcelist)");
     }
   }

   // ������� �������� ��������� � �������� ����
   // �.�. 'age' ���������� age=40.
   // ���������� ������ �� ������� ������ (� ������� operator())
   function eq( $value ) {
      return $this->operator( "=", $value );
   }

   // ������ ���
   function lt( $value ) {
      return $this->operator( "<", $value );
   }

   // ������ ��� 
   function gt( $value ) {
      return $this->operator( ">", $value );
   }

   // ��������� ������ ��� ������� operator.
   // �������� ������� ���� � ��������� �������� ��������� 
   // � ���������� ����� � ����
   private function operator( $symbol, $value ) {
      if ( $this->isVoid() ) {
         throw new Exception("���� �� ����������");
      }
      $this->currentfield->addTest( $symbol, $value );
      return $this;
   }

   // ���������� ��� ���������, ��������� �� ��� ��� � ������������� �������
   function getComps() {
      $ret = array();
      foreach ( $this->fields as $key => $field ) {
         $ret = array_merge( $ret, $field->getComps() );
      }
      return $ret;
   }
}


?>