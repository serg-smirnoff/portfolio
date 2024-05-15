<?php

$dbhost = 'localhost';
$dbname = 'iteria';
$dbuser= 'root';
$dbpassw = 'mysqlroot#';

$db = mysql_connect ("$dbhost", "$dbuser", "$dbpassw") or die ("Ошибка соединения с базой");
mysql_select_db('iteria',$db);

$sql = "SELECT idate, announce, text FROM news";

$result = mysql_query($sql) or die ("Неверный запрос");

/*
while ($row = mysql_fetch_assoc($result)) {
	echo date( 'r', $row ["idate"] )."<br><br>";
   	echo $row ["announce"]."<br><br>";
    echo $row ["text"]."<br><br><br>";
}
*/

/* $i=0; */
while ($row = mysql_fetch_array($result)) {

	echo "<b>".date( 'F m Y', $row ["idate"] )."</b><br><br>";
   	echo $row ["announce"]."<br><br>";
    echo $row ["text"]."<br><br><br>";

/*
	$array[$i] = $row;
	$i=$i+1;
*/

}

/* print_r ($array); */

mysql_close ($db);

?>
