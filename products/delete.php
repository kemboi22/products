<?php
require_once("connection.php");
global $db;
if(isset($_POST['checked_values'])){
    $checked_values = $_POST['checked_values'];
    foreach ($checked_values as $checked_value){
        //echo $checked_value;
        $query = mysqli_query($db->conn, "DELETE FROM products WHERE sku='".$checked_value."'");
//        $arrays = mysqli_fetch_array($query, MYSQLI_ASSOC);
//        foreach ($arrays as $array){
//            echo $array;
//        }
    }
}