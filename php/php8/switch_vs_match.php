<?php
    
    // switch
    
    $status_code = 2;

    switch ($status_code) {
        case 0:
        case 1:
            $message = null;
            break;
        case 2:
            $message = 'status_code = 2';
            break;
        case 3:
            $message = 'status_code = 3';
            break;
        default:
            $message = 'unknown status code';
            break;
    }

    print_r($message);

    // match

    $message = match ($status_code) {
        0,1 => null,
        2 => 'status_code = 2',
        3 => 'status_code = 3',
        default => 'unknown status code',
    };

    print_r($message);

?>