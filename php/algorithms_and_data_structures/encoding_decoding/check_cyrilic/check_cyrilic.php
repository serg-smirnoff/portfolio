<?php

function isRussian_var1($text) {
    // return preg_match("/[А-Яа-я]/", $text))
    return preg_match('/[А-Яа-яЁё]/u', $text);
}

function isRussian_var2($text) {
    return preg_match( '/[\p{Cyrillic}]/u', $text); 
}

function isRussian_var3($text){
  return preg_match('/&#10[78]\d/', mb_encode_numericentity($text, array(0x0, 0x2FFFF, 0, 0xFFFF), 'UTF-8'));
}

var_dump(isRussian_var1('test'));
var_dump(isRussian_var2('тест'));
var_dump(isRussian_var3('testtest'));
