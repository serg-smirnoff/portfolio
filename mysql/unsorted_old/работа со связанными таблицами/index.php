<?php

$dbhost = 'localhost';
$dbname = 'iteria';
$dbuser= 'root';
$dbpassw = 'mysqlroot#';

$db = mysql_connect ("$dbhost", "$dbuser", "$dbpassw") or die ("Ошибка соединения с базой");
mysql_select_db('iteria',$db);

//$sql = "SELECT idate, announce, text FROM items";

$result = mysql_query("
SELECT 
it.catalog_id, it.name as it_name, 
ct.id, ct.name as ct_name 
FROM 
items it, catalog ct 
WHERE ct.id=it.catalog_id
") or die ("Неверный запрос");

/*
while ($row = mysql_fetch_array($result)) {
   	echo $row["id"]."<br>";
}
*/

for ($i=0;$i<10;$i++)
{
   	$row[$i] = mysql_fetch_array($result);
/*
		echo $row[$i][1]."<br>";
		echo $row[$i]["name"]."<br>"."<br>";
*/
}

print_r ($row);
mysql_close ($db);

?>
