<?php function pwgen($len=8, $charset=''){
    if ($charset == '')
        $charset="abcdefghijklmnopqrstuvwxyz" .
        "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
    $res = '';
    $num = strlen($charset);
    for ($i=0; $i < $len; $i++){
        $idx = mt_rand(0, $num-1);
        $char = $charset[$idx];
        $res .= $char;
    }
    return ($res);
}
?>