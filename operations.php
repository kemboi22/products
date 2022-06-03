<?php
require_once 'connection.php';
$db = new connection();
class operations
{
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

            if($this->insert_record($sku, $name, $price, $type, $sizeDVD, $heightFurniture, $lengthFurniture, $widthFurniture, $bookWeight)){
                echo "
                    <div class='alert alert-success' role='alert'>
                        RECORD SAVED SUCCESSFULLY
                    </div>
                ";
                header('Refresh:2;url=https://blankety-pair.000webhostapp.com/products/products.php');
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                        RECORD NOT SAVED
                    </div>";
            }
        }


    }


    public function insert_record($sku, $name, $price, $type, $sizeDVD, $heightFurniture, $widthFurniture, $lengthFurniture, $bookWeight){
        global $db;
        $query = "INSERT INTO products(sku, name, price, type, sizeDVD, heightFuniture, lengthFuniture, widthFuniture, bookWeight)
                    Values('".$sku."', '".$name."', '".$price."', '".$type."', '".$sizeDVD."', '".$heightFurniture."', '".$widthFurniture."', '".$lengthFurniture."', '".$bookWeight."')";

        $result = mysqli_query($db->conn, $query);
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function show_products(){

        global $db;
        $query = "SELECT * FROM products";
        $result = mysqli_query($db->conn, $query);
        $products = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;
    }

    public function delete_selected(){
        global $db;
        if(isset($_POST['massDelete'])){
            echo "
                <script>
                confirm('Are you sure you want to delete ');
</script>
            ";
            $checkbox = $_POST['checkbox'];
            for($i=0;$i<count($checkbox);$i++){
                $del_id = $checkbox[$i];
                mysqli_query($db->conn, "DELETE FROM products WHERE sku='".$del_id."'");
                echo "<div class='alert alert-success' role='alert'>
                DATA DELETED SUCCESSFULLY
            </div>";
                header('url= https://blankety-pair.000webhostapp.com/products/products.php');
            }
        }

    }
}
