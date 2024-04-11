function utf8_win($s) {
     $out = "";
     $c1 = "";
     $byte2 = false;
     for ($c = 0; $c < strlen($s); $c ++){
          $i = ord($s[$c]);
          if ($i <= 127) $out .= $s[$c];
          if ($byte2) {
               $new_c2 = ($c1 & 3) * 64 + ($i & 63);
               $new_c1 = ($c1 >> 2) & 5;
               $new_i = $new_c1 * 256 + $new_c2;
               if ($new_i == 1025){
                    $out_i = 168;
               }else {
                    if ($new_i == 1105){
                         $out_i = 184;
                    }else {
                         $out_i = $new_i-848;
                    }
               }
               $out .= chr($out_i);
               $byte2 = false;
          }
          if (($i >> 5) == 6) {
               $c1 = $i;
               $byte2 = true;
          }
     }
     return $out;
}

function utf8_win1($s) {
$s=strtr($s,array("\xD0\xB0"=>"à", "\xD0\x90"=>"À", "\xD0\xB1"=>"á", "\xD0\x91"=>"Á",
 "\xD0\xB2"=>"â", "\xD0\x92"=>"Â", "\xD0\xB3"=>"ã", "\xD0\x93"=>"Ã", "\xD0\xB4"=>"ä",
 "\xD0\x94"=>"Ä", "\xD0\xB5"=>"å", "\xD0\x95"=>"Å", "\xD1\x91"=>"¸", "\xD0\x81"=>"¨",
 "\xD0\xB6"=>"æ", "\xD0\x96"=>"Æ", "\xD0\xB7"=>"ç", "\xD0\x97"=>"Ç", "\xD0\xB8"=>"è",
 "\xD0\x98"=>"È", "\xD0\xB9"=>"é", "\xD0\x99"=>"É", "\xD0\xBA"=>"ê", "\xD0\x9A"=>"Ê",
 "\xD0\xBB"=>"ë", "\xD0\x9B"=>"Ë", "\xD0\xBC"=>"ì", "\xD0\x9C"=>"Ì", "\xD0\xBD"=>"í",
 "\xD0\x9D"=>"Í", "\xD0\xBE"=>"î", "\xD0\x9E"=>"Î", "\xD0\xBF"=>"ï", "\xD0\x9F"=>"Ï",
 "\xD1\x80"=>"ð", "\xD0\xA0"=>"Ð", "\xD1\x81"=>"ñ", "\xD0\xA1"=>"Ñ", "\xD1\x82"=>"ò",
 "\xD0\xA2"=>"Ò", "\xD1\x83"=>"ó", "\xD0\xA3"=>"Ó", "\xD1\x84"=>"ô", "\xD0\xA4"=>"Ô",
 "\xD1\x85"=>"õ", "\xD0\xA5"=>"Õ", "\xD1\x86"=>"ö", "\xD0\xA6"=>"Ö", "\xD1\x87"=>"÷",
 "\xD0\xA7"=>"×", "\xD1\x88"=>"ø", "\xD0\xA8"=>"Ø", "\xD1\x89"=>"ù", "\xD0\xA9"=>"Ù",
 "\xD1\x8A"=>"ú", "\xD0\xAA"=>"Ú", "\xD1\x8B"=>"û", "\xD0\xAB"=>"Û", "\xD1\x8C"=>"ü",
 "\xD0\xAC"=>"Ü", "\xD1\x8D"=>"ý", "\xD0\xAD"=>"Ý", "\xD1\x8E"=>"þ", "\xD0\xAE"=>"Þ",
 "\xD1\x8F"=>"ÿ", "\xD0\xAF"=>"ß"));
return $s;
}

function win_utf8($in_text) { 
   $output = "";
   $other[1025] = "¨";
   $other[1105] = "¸";
   $other[1028] = "ª";
   $other[1108] = "º";
   $other[1030] = "I";
   $other[1110] = "i";
   $other[1031] = "¯";
   $other[1111] = "¿";
   for ($i = 0; $i < strlen($in_text); $i++){
      if (ord($in_text{$i}) > 191) {
         $output.="&#".(ord($in_text{$i})+848).";";
      }else {
         if (array_search($in_text{$i}, $other)===false){
            $output.=$in_text{$i};
         }else {
            $output.="&#".array_search($in_text{$i}, $other).";";
         }
      }
   }
   return $output;
}