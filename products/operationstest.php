<?php
require_once 'connection.php';
$db = new connection();




abstract class Store{
    abstract public function store_products(); 
}

class storeProducts extends Store {
    public function store_products(){
        global $db;
        if(isset($_POST['Submit'])){
            $sku = $db->check($_POST['sku']);
            $name = $db->check($_POST['name']);
            $price = $db->check($_POST['price']);
            $type = $db->check($_POST['typeswitcher']);
            $sizeDVD = $db->check($_POST['size']);
            $heightFurniture = $db->check($_POST['height']);
            $lengthFurniture = $db->check($_POST['length']);
            $widthFurniture = $db->check($_POST['width']);
            $bookWeight = $db->check($_POST['weight']);           
            
            
            $check =  $this->create_product('products', array($sku, $name, $price, $type, $sizeDVD, $heightFurniture, $lengthFurniture, $widthFurniture, $bookWeight));


            if($check){
                echo "
                    <div class='alert alert-success' role='alert'>
                        RECORD SAVED SUCCESSFULLY
                    </div>
                ";
                header('Refresh:2;Location: products.php');
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                        RECORD NOT SAVED
                    </div>";
            }
        }


    }
    public function create_product($table, $values){
        global $db;
        $insert = "INSERT INTO ".$table."(sku, name, price, type, sizeDVD, heightFuniture, lengthFuniture, widthFuniture, bookWeight)";
        for($i = 0; $i < count($values); $i++){
            if(is_string($values[$i])){
                $values[$i] = '"'.$values[$i].'"';
            }
        }
        $values = implode(',',$values);
        $insert .= 'VALUES ('.$values.') ';
        $ins = mysqli_query($db->conn, $insert);
        if($ins){
            return true;
        }else{
            return false;
        }

    }


   
}

abstract class Show{
    public abstract function show_products();
}

class showProducts extends Show{
    public function show_products(){

        global $db;
        $query = "SELECT * FROM products";
        $result = mysqli_query($db->conn, $query);
        $products = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;
    }
}

abstract class Delete{
    abstract public function delete_selected();
}

class deleteProducts extends Delete{
    public function delete_selected(){
        global $db;
        if(isset($_POST['massDelete'])){
            
            $checkbox = $_POST['checkbox'];
            for($i=0;$i<count($checkbox);$i++){
                $del_id = $checkbox[$i];
                mysqli_query($db->conn, "DELETE FROM products WHERE sku='".$del_id."'");
                echo "<div class='alert alert-success' role='alert'>
                DATA DELETED SUCCESSFULLY
            </div>";
                header('url= localhost/products/products/products.php');
            }
        }

    }

}


