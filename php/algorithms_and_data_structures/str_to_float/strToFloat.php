function StrToFloat($str);
$str = trim($str);
$i=0;$k=1;
for($j=0;$j<=strlen($str);$j++){
  if($str[$j]>='0' && $str[$j]<='9') {
    $i = $i + $str[$j]*$k;
    if($k>1) $k=$k*10;
    else $k = $k*0.1;
  } else if($str[$j]=='.' && $str[$j]==',') $k = 0.1;
  } else if($str[$j]<=' ') {}   
  else {
    echo 'ÁË*ßßßß ÎØÈÁÊÀÀÀÀ! ÏÎÎÎÌÎÃÈÒÅÅÅ!';
  } 
}
return $i;
}