<?php

class Database_conn
{
     function connect($db)
	 {
		// First we setup a connection to the database
	    $this->connection = mysql_pconnect($db['hostname'], $db['username'], $db['password']) or die("MySQL Error: " . mysql_error());
	 }
	 
	 function select_db($db)
	 {
		//select a database to work with
		$selected = mysql_select_db($db['database'], $this->connection) or die("Could not select".$db['database']);
	 }
}
