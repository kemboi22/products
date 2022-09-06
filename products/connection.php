<?php

require_once('operationstest.php');

class connection
{
    public $conn;
    public function __construct(){
        $this->dbconnection();
    }
    public function dbconnection(){
        $this->conn = mysqli_connect(
            'localhost',
            'root',
            '',
            'products'
        );

        if(mysqli_connect_error()){
            die('Connection Failed');
        }

    }

    public function check($a){
        $return = mysqli_real_escape_string($this->conn, $a);
        return $return;
    }
}

$dbconn = new connection();
echo $dbconn->dbconnection();
