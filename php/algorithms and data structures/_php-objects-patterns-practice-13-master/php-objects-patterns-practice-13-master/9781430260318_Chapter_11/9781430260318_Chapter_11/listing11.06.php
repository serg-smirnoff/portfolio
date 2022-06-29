<?php

class Login {
    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;
    private $status = array();

    function handleLogin( $user, $pass, $ip ) {
        switch ( rand(1,3) ) {
            case 1:
                $this->setStatus( self::LOGIN_ACCESS, $user, $ip );
                $isvalid = true; break;
            case 2:
                $this->setStatus( self::LOGIN_WRONG_PASS, $user, $ip );
                $isvalid = false; break;
            case 3:
                $this->setStatus( self::LOGIN_USER_UNKNOWN, $user, $ip );
                $isvalid = false; break;
        }
        Logger::logIP( $user, $ip, $this->getStatus() );
        if ( ! $isvalid ) {
            Notifier::mailWarning( $user, $ip,
                                   $this->getStatus()  );
        }
        return $isvalid;
    }

    private function setStatus( $status, $user, $ip ) {
        $this->status = array( $status, $user, $ip );
    }

    function getStatus() {
        return $this->status;
    }

}

class Notifier {
    static function mailWarning( $user, $ip, array $status ) {
        print "Notifier: $user, ip: $ip status:";
        print implode("/", $status);
        print "\n";
    }

}
class Logger {
    static function logIP( $user, $ip, array $status ) {
        print "Loggger: $user, ip: $ip status:";
        print implode("/", $status);
        print "\n";
    }
}

$login = new Login();
for ( $x=1; $x<20; $x++ ) {
    $login->handleLogin( "bob","mypass", '158.152.55.35' );
}

?>
