<?php
if (!$SQL_CLASS_LOAD){
  class cSQL {
	
    var $sql_type;
    var $errstr;
    var $errno;
    var $db;
    var $num_fields;
    var $num_rows;
    var $no_queries;
    var $result;
    var $myrow;
    var $sql_query;

    function connect($sql_type, $hostname, $username, $password, $db){
    //function connect(){
      //$sql_type = 'MySQL';
      //$hostname = 'localhost';
      //$username = 'root';
      //$password = 'xxx';
      //$db = 'chat';
      switch (strtolower($sql_type)){
	    /* MySQL */
	    case 'mysql' :
			$this->sql_type = "MySQL";
			if (($this->db = mysql_connect($hostname, $username, $password)) === FALSE){
			    $this->error(mysql_error(), mysql_errno());
			}
			if ($db != 'null'){
		  	    if ((mysql_select_db($db, $this->db)) === FALSE){
			        $this->error(mysql_error(), mysql_errno());
			    }
		    }
		    return TRUE;
		    break;
		/* END MySQL */
		/* PostgrSQL */
		case 'postgresql' :
			$this->sql_type = "PostgreSQL";
		    if (($this->db = pg_connect("host=".$hostname." dbname=".$db." user=".$username." password=".$password)) === FALSE){
				  $this->error(pg_errormessage(), 1);
		    }
		    return TRUE;
			break;
		/* END PostgreSQL */
		default :
			$this->error("Unkown database type '$sql_type'", 1);
			break;
		}
		$this->no_queries = 0;
	  }

	  function select_db($db){
		  switch($this->sql_type){
			  /* MySQL */
			  case 'MySQL' :
			  if ((mysql_select_db($db, $this->db)) === FALSE){
				  $this->error(mysql_error(), mysql_errno());
				  return FALSE;
			  }
			  return TRUE;
			  break;
			  /* END MySQL */
		  }
	  }

	  function query($sql){
	  switch($this->sql_type){
	  /* MySQL */
	  case 'MySQL' :
	      $this->sql_query = $sql;
	      if (($this->result = mysql_query($sql)) === FALSE){
				  $this->error(mysql_error(), mysql_errno());
			  }
	      ++$this->no_query;
	      if (is_resource($this->result)){
			    $this->num_fields = mysql_num_fields($this->result);
			    $this->num_rows = mysql_num_rows($this->result);
	      }
		  return TRUE;
		  break;
	  /* END MySQL */
	  /* PostgreSQL */
	  case 'PostgreSQL' :
	      $this->sql_query = $sql;
	      if (($this->result = pg_query($sql)) === FALSE){
				  $this->error(pg_errormessage(), 1);
			  }
	      ++$this->no_query;
	      if (is_resource($this->result)){
			    $this->num_fields = pg_num_fields($this->result);
			    $this->num_rows = pg_num_rows($this->result);
	      }
		  return TRUE;
		  break;
	  /* END PostgreSQL */
	  }
	  }

	  function result(){
	  switch($this->sql_type){
	  /* MySQL */
		case 'MySQL' :
		  $this->myrow = mysql_fetch_array($this->result);
		  return $this->myrow;
		  break;
  	  /* END MySQL */
  	  /* PostgreSQL */
		case 'PostgreSQL' :
		  $this->myrow = pg_fetch_array($this->result);
		  return $this->myrow;
		  break;
  	  /* END PostgreSQL */
	  }
	  }

	  function show_tables(){
	  switch($this->sql_type){
	  /* MySQL */
		case 'MySQL' :
		  $this->query("show tables;");
		  break;
	  /* END MySQL */
  	  /* PostgreSQL */
  		case 'PostgreSQL' :
		  $this->query("select * from \"pg_tables\""); //test
		  break;
   	  /* END PostgreSQL */
	  }
	  }

	  function describe($sql_table){
	  switch($this->sql_type){
	  /* MySQL */
		case 'MySQL' :
		  $this->query("describe ".$sql_table);
		  break;
	  /* END MySQL */
  	  /* PostgreSQL */
  		case 'PostgreSQL' :
		  $this->query("SELECT a.attname, format_type(a.atttypid, a.atttypmod), a.attnotnull, a.atthasdef, a.attnum, col_description(a.attrelid, a.attnum) FROM pg_class c, pg_attribute a WHERE c.relname='".$sql_table."' AND a.attnum > 0 AND a.attrelid = c.oid ORDER BY a.attnum"); //test
		  break;
   	  /* END PostgreSQL */
	  }
	  }

	  function optimize($table){
	  switch($this->sql_type){
	  /* MySQL */
		case 'MySQL' :
		  $this->query("optimize table `".$table."`");
		  break;
	  /* END MySQL */
  	  /* PostgreSQL */
  		case 'PostgreSQL' :
		  $this->query("vacuum \"".$table."\"");
		  $this->query("reindex table \"".$table."\"");
		  break;
   	  /* END PostgreSQL */
	  }
	  }

	  function report(){
		  echo $this->no_query;
	  }

    function last_insert_id(){
      return mysql_insert_id($this->db);
    }

	  function error($errstr, $errno){
		  echo "<FONT FACE = \"Tahoma\" SIZE = 1 COLOR = \"#FF0000\">\n";
		  echo $this->sql_type . " Error: <B>$errstr</B> [$errno]<BR>\n";
      echo "<B>SQL Query:</B><I> ".$this->sql_query."<BR>\n";
		  echo "</FONT>\n";
		  die();
	  }
    function close(){
    switch($this->sql_type){
	/* MySQL */
	  case 'MySQL' :
        mysql_close($this->db);
	    break;
	/* END MySQL */
  	/* PostgreSQL */
	  case 'PostgreSQL' :
	    pg_close($this->db);
	    break;
    /* END PostgreSQL */
    }
	}
  }
}
$SQL_CLASS_LOAD = 1;
?>
