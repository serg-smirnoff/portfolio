<?php


class UserStore {
   private $users = array();

   function addUser( $name, $mail, $pass ) {
      if ( isset( $this->users[$mail] ) ) {
         throw new Exception(
            "������������ {$mail} ��� ���������������.");
      }
      $this->users[$mail] = new User( $name, $mail, $pass );
      return true;
   }

   function notifyPasswordFailure( $mail ) {
      if ( isset( $this->users[$mail] ) ) {
         $this->users[$mail]->failed(time());
      }
   }

   function getUser( $mail ) {
      if ( isset( $this->users[$mail] ) ) {
         return ( $this->users[$mail] );
      }
      return null;
   }
}




/*

class UserStore {
   private $users = array();

   function addUser( $name, $mail, $pass ) {
      if ( isset( $this->users[$mail] ) ) {
         throw new Exception(
              "������������ {$mail} ��� ���������������.");
      }

      if ( strlen( $pass ) < 5 ) {
         throw new Exception(
              "����� ������ ������ ���� �� ����� 5 ��������.");
      }

      $this->users[$mail] = array( 'pass' => $pass,
                                   'mail' => $mail,
                                   'name' => $name );
      return true;
}

   function notifyPasswordFailure( $mail ) {
      if ( isset( $this->users[$mail] ) ) {
         $this->users[$mail]['failed']=time();
      }
   }

   function getUser( $mail ) {
      return ( $this->users[$mail] );
   }
}

*/

?>