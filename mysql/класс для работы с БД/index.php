<?
class base
{
	
	var $db;
		
	// создает соединение с базой
	function connect ($dbhost,$dbname,$dbuser,$dbpassw)
	{
			$this->db = mysql_connect ("$dbhost", "$dbuser", "$dbpassw") or die (mysql_error); 
			mysql_select_db('iteria',$this->db);
	}
	
	// функции исполняющие запрос
	function query ($sql)
	{
			$result = mysql_query($sql) or die (mysql_error());
			return $result;
	}

	function sql1($sql1) {
		// die($sql1);
		$query = $this->query ($sql1);
		$result = mysql_fetch_row($query);
		return $result[0];
	}

	function sql2($sql2) {
			$query	= $this->query ($sql2);
			//$result = mysql_result($query,"1","6");
			$result = mysql_fetch_array($query);			
			return $result;
	}
	
	// sql - 3 # Возвращает набор строк
	function sql3($sql3) {

			$query = $this->query ($sql3);
			
			$i=0;
			while ($row = mysql_fetch_assoc($query)) {
				$result[$i] = $row;
				$i++;
			}		
			return $result;
	}

	// закрывает соединение с базой
	function disconnect ()
	{
			mysql_close ($this->db) or die (mysql_error);
	}
}

	$dbhost = 'localhost';
	$dbname = 'iteria';
	$dbuser = 'root';
	$dbpassw = 'mysqlroot#';
	
		$sql1 = "SELECT name FROM items WHERE id = 3";
		$sql2 = "SELECT * FROM items WHERE id = 3";
		$sql3 = "SELECT * FROM items";
	
	$newClass = new base();
	
	$newClass->connect($dbhost, $dbname, $dbuser, $dbpassw);

		$sql01 = $newClass->sql1($sql1);
		$sql02 = $newClass->sql2($sql2);		
		$sql03 = $newClass->sql3($sql3);		

		print_r ($sql01);

/*		echo $sql02;	*/

		print_r ($sql02);

		print_r ($sql02);
	
	
	
	
	$newClass->disconnect();

	
	
?>