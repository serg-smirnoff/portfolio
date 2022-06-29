<?php

$dbhost = 'localhost';
$dbname = 'iteria';
$dbuser= 'root';
$dbpassw = 'mysqlroot#';

$db = mysql_connect ("$dbhost", "$dbuser", "$dbpassw") or die ("Ошибка соединения с базой");

mysql_select_db('iteria',$db);

$result = mysql_query("
SELECT 
	distinct it.price as price, it.catalog_id, it.name as item_name, ct.name as catalog_name, ct.id, count(it.id), sum(it.price) as sum_price
FROM 
	catalog ct, items it
WHERE
	 it.catalog_id=ct.id and it.price > 1000
GROUP BY
	 it.catalog_id
") or die (mysql_error());

echo "<table border=1><tr><td><b>item_name</b></td><td><b>catalog_name</b></td><td><b>price</b></td></tr>";

while ($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['catalog_id']."</td>\n";
	echo "<td>".$row['catalog_name']."</td>\n";
	echo "<td>".$row['price']."</td>\n";
	echo "</tr>";
}

echo "</table>";

print_r ($row);
mysql_close ($db);

?>
