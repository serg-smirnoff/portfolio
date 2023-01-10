<?php

function computeImageSize($imgWidth, $imgHeight, $canvasWidth, $canvasHeight,
&$resultWidth, &$resultHeight)

{
//put your code here

if ($imgWidth > $canvasWidth) $resultWidth = $canvasWidth;
if ($imgHeight > $canvasHeight) $resultHeight = $canvasHeight;


return imagecopyresized ($img2 , $img , 0 , 0 , $imgWidth , $imgHeight  , $resultWidth , $resultHeight , $imgWidth , $imgHeight );

}

$img = "logo.jpg";
$imgSize = getimagesize($img);

$imgWidth = $imgSize[0]; //276
$imgHeight = $imgSize[1]; //129

$canvasWidth = 100;
$canvasHeight = 100;

computeImageSize();

?>


