<?php

class Model extends Database {

    // When our model is instantiated we just need
    // to also instantiate our parent class (Database)
    // so it knows to make the connection to the database.
    public function __construct()
    {
        // We just call the __construct of Database class.
        parent::__construct();
    }

}