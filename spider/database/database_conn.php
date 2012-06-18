<?php

class Database_conn
{
     function connect()
	 {
		// First we setup a connection to the database
	    $this->connection = mysql_pconnect("localhost", "", "") or die("MySQL Error: " . mysql_error());
	 }
}
