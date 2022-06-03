<?php
require_once('operations.php');
class connection
{
    public $conn;
    public function __construct(){
        $this->dbconnection();
    }
    public function dbconnection(){
        $this->conn = mysqli_connect(
            'localhost',
            'id19041291_kemboi22',
            '0722790520zZ$',
            'id19041291_root'
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
