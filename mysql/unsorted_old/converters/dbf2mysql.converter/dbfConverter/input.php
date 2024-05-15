<?php
####################################################################
#                                                                  #
#    PHP dbfConverter V0.9                                         #
#    import data from dbase format to mysql or postgres            #
#    by kroket  Jun.2002                         kroket@bo-bo.si   #
#    http://server.bo-bo.si/php/dbfConverter/                      #
#                                                                  #
####################################################################
require("config.php");
require_once("sql.class.php");
function GetFType($sql_type,$type, $length, $precision){
	if ($sql_type=='MySQL'){
		if ($type=="N" && $precision==0) Return "int(".$length.")";
		if ($type=="N" && $precision>=1) Return "decimal(".$length.",".$precision.")";
		if ($type=="C" && $length>=4) Return "varchar(".$length.")";
		if ($type=="C" && $length<=3) Return "char(".$length.")";
		if ($type=="D") Return "date";
		if ($type=="L") Return "char(".$length.")";
		if ($type=="F" && $precision==0) Return "float(".$length.")";
		if ($type=="F" && $precision>=1) Return "float(".$length.",".$precision.")";
		if ($type=="N/A" && $length>=4) Return "varchar(".$length.")";
		if ($type=="N/A" && $length<=3) Return "char(".$length.")";
		if ($type=="M" || $type=="G") Return "longtext";
		if ($type=="P" || $type=="B") Return "longblob";
		if ($type=="T") Return "datetime";
		if ($type=="I") Return "int(".$length.")";
		if ($type=="Y") Return "decimal(".$length.",".$precision.")";
	}
	if ($sql_type=='PostgreSQL'){
		if ($type=="N" && $precision==0) Return "integer";//(".$length.")";
		if ($type=="N" && $precision>=1) Return "numeric(".$length.",".$precision.")";
		if ($type=="C" && $length>=4) Return "character varying(".$length.")";
		if ($type=="C" && $length<=3) Return "character(".$length.")";
		if ($type=="D") Return "date";
		if ($type=="L") Return "boolean";
		if ($type=="F" && $precision==0) Return "real";
		if ($type=="F" && $precision>=1) Return "double precision";
		if ($type=="N/A" && $length>=4) Return "character varying(".$length.")";
		if ($type=="N/A" && $length<=3) Return "character(".$length.")";
		if ($type=="M" || $type=="G") Return "text";
		if ($type=="P" || $type=="B") Return "bytea";
		if ($type=="T") Return "datetime";
		if ($type=="I") Return "inet";//(".$length.")";
		if ($type=="Y") Return "money";
	}
}
function DropAfterNULL($string){
	for ($i=-1; $i<=strlen($string); $i++){
		$temp_s=implode(' ',unpack ('C*', substr($string, $i, 1)));
		if ($temp_s==0) return substr($string, 0, $i);
	}
Return $string;
}
function MemoEnd($string){
	for ($i=-1; $i<=strlen($string); $i++){
		$temp_s=implode(" ", unpack ('H*', substr($string, $i, 1)));
		if ($temp_s=="1a") return substr($string, 0, $i);
	}
Return $string;
}
function GetMemo($data, $block, $Size_of_block, $file_size){
	$next="ok";
	$i=0;
	while ($next=="ok"){
		$i=$i+$Size_of_block;
		$offset=($block)*$Size_of_block;
		$read_bytes=$file_size-$offset;
		if ($read_bytes>=$Size_of_block) $read_bytes=$Size_of_block;
		$block_format = 'A'.$read_bytes.'Memo';
		$block_data=unpack ("@$offset/$block_format", $data);
		$memo.=MemoEnd($block_data["Memo"]);
		if (strlen($memo)!=$i) $next="";
		$block++;
	}
Return $memo;
}
?>
<html>
<head>
<title>select & update area</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
</head>
<body bgcolor="#DDE8FF" text="#000000">
<form name="form1" method="post" action="<? echo $PHP_SELF ?>">
<table border="0">
<?
/***  Read units (directory) contents & show it with checkboxes  ***/
foreach ($unit as $unit_tmp){
$i=0;
?>
	<tr> 
	<td nowrap> <?=$fieldUnitName?> <b> 
	<?echo strtoupper($unit_tmp)?>:
	</b> </td>
	<?$handle=opendir($unit_tmp);
	while ($file = readdir($handle)){
		if (substr($file, -3) == "dbf" OR substr($file, -3) == "DBF"){
			$i++;
			$db_file[$unit_tmp][$i]= $file;
			$db_file_name[$unit_tmp][$i]= strtolower(substr($file, 0, -4));
			$sql_table_name[$unit_tmp][$i] = $unit_tmp."_".$db_file_name[$unit_tmp][$i];?>
			<td nowrap align="right"><b>&nbsp;&nbsp;&nbsp;<?=$db_file_name[$unit_tmp][$i]?>: </b>
			<input type="checkbox" name="<?echo $sql_table_name[$unit_tmp][$i];?>" value="yes" <?if ($$sql_table_name[$unit_tmp][$i] == "yes") echo "checked"?>>&nbsp;&nbsp;&nbsp;<?
		}
	}
	closedir($handle);?>
	</td>
<?
}
/***  change names of sql tables - configured in config.php  ***/
foreach ($sql_table_name as $key => $value) {
	foreach($value as $key1 => $value1){
		$sql_table_name[$key][$key1] = strtr($value1, $transformTableNames);
	}
}
?>
</tr>
</table>
<p>
<input type="submit" name="update" value="go update">
</p>
</form>
<?
if ($update=="go update"){
	ini_set("max_execution_time",$maxExecTime);
$sql = new cSQL;
$sql->connect($sql_type, $sql_host, $sql_user, $sql_pass, $sql_db);
echo "<b><font color='blue'>User ".$sql_user.": working on ".$sql->sql_type.", using database ".$sql_db." on ".$sql_host."</font></b><br><br>";
/***  for each unit (directory)  ***/
	foreach ($unit as $unit_tmp){
		$i=0;
/***  for each unit dbase (dbf file in directory)  ***/
		foreach ($db_file[$unit_tmp] as $db_file_tmp) {
			$sql_id=""; 
			$sql_unit="";
			$i++;
			$fields = array();
			$unit_orig=$unit_tmp."_".$db_file_name[$unit_tmp][$i];
			if ($$unit_orig == "yes"){
				echo "<font color='blue'>".ucfirst(strtolower($db_file_tmp))."</font>: ";
				$file = $unit_tmp."/".$db_file_tmp;
/*** check for memo file & get size of blocks  ***/
				$memo_file="";
				if (file_exists(substr($file, 0, -1)."t")) $memo_file=substr($file, 0, -1)."t";
				if (file_exists(substr($file, 0, -1)."T")) $memo_file=substr($file, 0, -1)."T";
				if (file_exists(substr($file, 0, -3)."fpt")) $memo_file=substr($file, 0, -3)."fpt";
				if (file_exists(substr($file, 0, -3)."FPT")) $memo_file=substr($file, 0, -3)."FPT";
				if ($memo_file!=""){
					$memo_fp = fopen ($memo_file, 'rb')
						or die ("File <i>$memo_file</i> cannot be opened.");
					$memo_data = fread ($memo_fp, filesize($memo_file))
						or die ("Could not read data from file <i>$memo_file</i>");
					$memo_header_format = 'SNext aviable/'.'SSize of blocks/'.'A8Dbf name';
					$memo_header = unpack ($memo_header_format, $memo_data);
					if ($memo_header["Size of blocks"]==0) $memo_header["Size of blocks"]=512;
				}
/*** get field names, types & lenght fom dbf files  ***/
				$fp = fopen ($file, 'rb')
					or die ("File <i>$file</i> cannot be opened.");
				$data = fread ($fp, 32)
					or die ("Could not read data from file <i>$file</i>");
				$header_format = 'H2id/' . 'CYear/' . 'CMonth/' . 'CDay/' . 'L# of Records/' . 'SHeader Size/' . 'SRecord Size';
				$header = unpack ($header_format, $data);
				$data = fread ($fp, $header['Header Size'] - 34)
					or die ("Could not read data from file <i>$file</i>");
				$record_format = 'A11Field Name/' . 'AField Type/' . 'x4/' . 'CField Length/' . 'CField Precision';
				$x=0;
				for ($offset = 0; $offset < strlen ($data); $offset += 32) {
					$x++;
					$fields[$x] = unpack("@$offset/$record_format", $data);
					foreach ($fields[$x] as $key => $value) {$fields[$x][$key] = DropAfterNULL(trim($value));}
				}
/***  check if mysql table wit this name exist  ***/
				$ii=0;
				$y=0;
				$mysql_struct=array();
				$mysql_table=$sql->show_tables();
				while ($sql->result()){
					$y++;
					$tb_names[$y]=$sql->myrow['0'];
				}
/***  get field names & types from mysql table  ***/ 
				if	(is_array($tb_names) && in_array($sql_table_name[$unit_tmp][$i], $tb_names)){
				$sql->describe($sql_table_name[$unit_tmp][$i]);
					if ($sql->num_rows>=1){
						//while ($myrow = mysql_fetch_array($mysql_table)){
						while ($sql->result()){
							$ii++;
							$mysql_struct[$ii]["Field"]=$sql->myrow['0'];
							$mysql_struct[$ii]["Type"]=$sql->myrow['1'];
						}
					}
				}
/***  create query for table create  ***/
				if ($needID[$sql_table_name[$unit_tmp][$i]]==1 && $sql->sql_type=="MySql") $sql_id="`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
				if ($needID[$sql_table_name[$unit_tmp][$i]]==1 && $sql->sql_type=="PostgreSQL") $sql_id="\"id\" SERIAL, PRIMARY KEY (\"id\"), ";
				if ($needUnitName[$sql_table_name[$unit_tmp][$i]]==1) $sql_unit="`" . $fieldUnitName . "` VARCHAR(15) NOT NULL, ";
				$quer="CREATE TABLE `" . $sql_table_name[$unit_tmp][$i] . "` (" . $sql_id . $sql_unit;
				$exist=0;
				$y=0;
				foreach ($fields as $field){					
					$field['Field Name']=ucfirst(strtolower($field['Field Name']));
					if ($field['Field Type']=="M" && $memo_file==""){
						echo "<br><b>warning:</b> memo field exist, but memo file <b>".strtolower(substr($file, 0, -1)."t")."</b> not fund. <b><font color=red> memo field ignored</font></b><br>";
						continue 1;
					}elseif ($field['Field Type']=="M" && $memo_file!=""){
						echo "including <b>dbt</b> memo file, ";
					}
					if (($field['Field Type']=="G" || $field['Field Type']=="P") && $memo_file==""){
						echo "<br><b>warning:</b> memo field exist, but memo file <b>".strtolower(substr($file, 0, -3)."fpt")."</b> not fund. <b><font color=red> memo field ignored</font></b><br>";
						continue 1;
					}elseif (($field['Field Type']=="G" || $field['Field Type']=="P") && $memo_file!=""){
						echo "including <b>fpt</b> memo file, ";
					}
					if ($field['Field Type']=="B" && $memo_file!=""){
						echo "including <b>dbt</b> memo file, ";
					}
					$quer .= "`" . $field['Field Name'] . "` " . GetFType($sql_type,$field['Field Type'],$field['Field Length'], $field['Field Precision']) . " NOT NULL" . ", ";
					$y++;
					if (is_array($mysql_struct)){
						foreach ($mysql_struct as $ii){
							if ($field['Field Name']==$ii["Field"] && GetFType($sql_type,$field['Field Type'],$field['Field Length'], $field['Field Precision'])==$ii["Type"]){$exist++;}
						}
					}
				}
				$quer=substr($quer, 0, -2) . ") TYPE=MyISAM";
/***  create mysql table if not exist  ***/
				$new_table="";
				if ($exist==0){
				  if ($sql->sql_type == "PostgreSQL"){
				    $quer=str_replace("`", "\"", $quer);
					$quer=str_replace("TYPE=MyISAM", "", $quer);
				  }
					$sql->query($quer);
				$exist=$y;
				if ($needUnitName[$sql_table_name[$unit_tmp][$i]]==1) $mysql_struct[0]["Field"]=$fieldUnitName;
				echo "creating table <b>".$sql_table_name[$unit_tmp][$i]."</b>, ";
				$new_table="yes";
				}else{
					echo "table <b>".$sql_table_name[$unit_tmp][$i]."</b> exist, ";
				}
/***  mysql table exist, but it's not the same table, skip  ***/
				if ($exist!=$y){
					echo "but not have the same Field names or Field types! <font color='red'><b>skipped</b></font>";
				}else{
/***  delete old data from mysql table (update mode 1) or get last record number (update mode 2)  ***/
					$update_from=1;
					if ($updateMode[$sql_table_name[$unit_tmp][$i]]==2){
						$que_del="";
						if (is_array($mysql_struct)){
							foreach ($mysql_struct as $ii){
								if ($ii["Field"]==$fieldUnitName){
									$que_del="SELECT * FROM " . $sql_table_name[$unit_tmp][$i] . " where " . 	$fieldUnitName . " = '" . strtoupper($unit_tmp) . "'";
								}
							}
							if ($que_del=="") $que_del="SELECT * FROM " . $sql_table_name[$unit_tmp][$i];
							$sql->query($que_del);
							$update_from=$sql->num_rows+1;
							if ($update_from<=0) $update_from=1;
						}
					}else{
						$update_from=1;
						$que_del="";	
						if (is_array($mysql_struct)){
							foreach ($mysql_struct as $ii){
								if ($ii["Field"]==$fieldUnitName){
									$que_del="DELETE FROM `" . $sql_table_name[$unit_tmp][$i] . "` where `" . 	$fieldUnitName . "` = '" . strtoupper($unit_tmp) . "'";
								}
							}
							if ($que_del=="") $que_del="DELETE FROM `" . $sql_table_name[$unit_tmp][$i] ."`";
							if ($sql->sql_type == "PostgreSQL"){
								$que_del=str_replace("`", "\"", $que_del);
						    }
							$sql->query($que_del);
						}
					}
/***  rad data from dbf file & insert in mysql table  ***/
					fread ($fp, 3);
					if ($header["# of Records"]!=0){
						$data = fread ($fp, ($header["# of Records"]*$header["Record Size"])-1);
					}else{
						$data="";
					}
					$row_format="";
					foreach ($fields as $field){
						$row_format .= 'A' . $field["Field Length"] . $field["Field Name"] . "/";
					}
					$row_format = substr($row_format, 0, -1);
					?><script>
						window.parent.graf.f_enota.enota.value=<?echo "\"making ".$sql_table_name[$unit_tmp][$i].":\""?>;
					</script><?
					$on_ever = floor(($header["# of Records"]-$update_from+1)/100);
					$tempo=1;
					if ($on_ever<1){
						$tempo=($header["# of Records"]-$update_from+1)/100;
						if ($tempo!=0){
							$tempo=1/$tempo;
						}else{
							$tempo=1;
						}
						$on_ever=1;
					}
					$perc=0;
					$where_we_are=$on_ever;
					for ($rec_no=$update_from; $rec_no<=$header["# of Records"]; $rec_no++){
						if ($rec_no>=$where_we_are){
							$where_we_are+=$on_ever;
							$perc+=$tempo;if ($perc>=100) $perc=100;?>
							<script>
								window.parent.graf.procent.perc.value=<?echo $perc?>;
							</script><?
							flush();
						}
						$offset = $header["Record Size"]*$rec_no;
						$record = (@unpack ("@$offset/$row_format", $data));
						$sql_where="INSERT INTO `".$sql_table_name[$unit_tmp][$i]."` (";
						$sql_data=" VALUES (";
						if (is_array($mysql_struct)){
							foreach ($mysql_struct as $ii){
								if ($ii["Field"]==$fieldUnitName){
									$sql_where.="`".$fieldUnitName."`, ";
									$sql_data.="\"" . strtoupper($unit_tmp) . "\"" . ", ";
								}
							}
						}
						foreach ($fields as $field){
							if (($field['Field Type']=="M" || $field['Field Type']=="G" || $field['Field Type']=="P") && $memo_file==""){
								continue 1;
							}
							if (($field['Field Type']=="M" || $field['Field Type']=="G") && $memo_file!="" && trim($record[$field['Field Name']])!=""){
								$record[$field['Field Name']]=trim(GetMemo($memo_data, $record[$field['Field Name']],$memo_header["Size of blocks"],filesize($memo_file)));
							}
							if (($field['Field Type']=="B" || $field['Field Type']=="P") && $memo_file!="" && trim($record[$field['Field Name']])!=""){
								$record[$field['Field Name']]=GetMemo($memo_data, $record[$field['Field Name']],$memo_header["Size of blocks"],filesize($memo_file));
							}
							$sql_where.="`".ucfirst(strtolower($field['Field Name']))."`, ";
/***  do not transform binary files  ***/
							if ($field['Field Type']=="B" || $field['Field Type']=="P"){
								$sql_data.="\"".addslashes($record[$field['Field Name']])."\"".", ";
							}else{
/*** pg dont like empty decimal fields ***/
								if ($field['Field Type']=="N" && $field['Field Precision']>=1 && trim($record[$field['Field Name']])=="") {$record[$field['Field Name']]=0;}
/*** and empty date fields and dont like 00000000 too :( ***/
								if ($field['Field Type']=="D" && trim($record[$field['Field Name']])=="") {$record[$field['Field Name']]="19700101";}
								$sql_data.="\"".addslashes(strtr($record[$field['Field Name']], $transform))."\"".", ";
							}
						}
						$sql_where=substr($sql_where, 0, -2).")";
						$sql_data=substr($sql_data, 0, -2).")";
						$quer=$sql_where.$sql_data;
						if ($sql->sql_type == "PostgreSQL"){
						    $quer=str_replace("\"", "'", $quer);
							$quer=str_replace("`", "\"", $quer);
					    }
						$sql->query($quer);
					}
					if ($updateMode[$sql_table_name[$unit_tmp][$i]]==2){
						$newer_records=$header["# of Records"]-$update_from+1;
						if ($newer_records >= 1){
							echo "successfully inserting <b>". $newer_records ."</b> newer records from <b>" . strtolower($file) . "</b>";
						}else{
							if ($new_table!="yes"){
								echo "no newer records found in <b>" . strtolower($file) . "</b>";
							}else{
								echo "no records found in <b>" . strtolower($file) . "</b>";
							}
						}
					}else{
						if ($header["# of Records"]>=1){
							echo "successfully ";
							if ($new_table!="yes") echo "delete old records and "; 
							echo "inserting <b>". $header["# of Records"] . "</b> new records from <b>" . strtolower($file) . "</b>";
						}else{
							echo "no records found in <b>" . strtolower($file) . "</b>";
						}
					}
					fclose ($fp);
					if ($memo_file!="") fclose ($memo_fp);
				}
/***  delete some rows whitch we dont need  ***/
				if (is_array($data_delete)){
					if ($data_delete[$sql_table_name[$unit_tmp][$i]]){
						$que_del="DELETE FROM `" . $sql_table_name[$unit_tmp][$i] . "` WHERE " . $data_delete[$sql_table_name[$unit_tmp][$i]];
						if ($sql->sql_type == "PostgreSQL"){
							$que_del=str_replace("`", "\"", $que_del);
						}
						echo "<br>deleting data from <b>".$sql_table_name[$unit_tmp][$i]."</b> where <b>".$data_delete[$sql_table_name[$unit_tmp][$i]]."</b>";						
						if ($sql->query($que_del) === FALSE){
							//printf("<BR>mysql error: %s\n", mysql_error());
							echo "<br><b>check \$data_delete[\"".$sql_table_name[$unit_tmp][$i]."\"]=<font color='red'>\"".$data_delete[$sql_table_name[$unit_tmp][$i]]."\"</font>; in config.php</b><br>";
						}
					}
				}
				echo ", optimizing table <b>".$sql_table_name[$unit_tmp][$i].",";
				$sql->optimize($sql_table_name[$unit_tmp][$i]);
				echo "<font color='blue'> done</font></b><br>";
			}
		}
	}
?><script>
window.parent.graf.f_enota.enota.value=<?echo "\"done\""?>;
</script><?
echo "<br><b><font color='blue'>Done in all</font></b><br>";
}
?>
</body>
</html>