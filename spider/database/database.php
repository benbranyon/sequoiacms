<?php

class Database
{
     protected $connection;

     //Everytime you instantiate this class you are going to create a new connection to the database.
     public function __construct()
     {
     }

     //Helper function to help out with possible sql injection attacks.]
     public function escapeString($string)
     {
          return mysql_real_escape_string($string);
     }

     //Query the database build and array of objects and return
     public function query($query)
     {
     }

     //Method for handling INSERTs and UPDATEs
     public function execute($query)
     {
          $exec = mysql_query($query) or die("MySQL Error: " . mysql_error());
	  return $exec;
     }

}
