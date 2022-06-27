<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.xls" );// put your file name here
$url = 'Library.xml'; // xml file location with file name
if (file_exists($url)) {
    $xml = simplexml_load_file($url);
    echo 'Title'."\t" . 'Author'."\t" . 'Publisher'."\t" . 'Price'."\t\n";
    foreach($xml->book as $books)
    {
        echo $books->title."\t" . $books->author."\t" . $books->publisher."\t" . $books->price."\n";
    }
}
?>