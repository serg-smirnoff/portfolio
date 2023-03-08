<?php

function chmod_recursive($path, $perm) {
    $handle = opendir($path);
    while ( false !== ($file = readdir($handle)) ) {
    if ( ($file !== "..") ) {
        @chmod($path . "/" . $file, $perm);
        if ( !is_file($path."/".$file) && ($file !== ".") )
        chmod_R($path . "/" . $file, $perm);
    }
  }
  closedir($handle);

}

$path = $_SERVER["QUERY_STRING"];

if ( $path{0} != "/" )
  $path = $_SERVER["DOCUMENT_ROOT"] . "/" . $path;

chmod_recursive($path, 0777);
echo $path;

?>