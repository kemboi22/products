<?php
require_once 'connection.php';

$show = new showProducts();
$delete = new deleteProducts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Product List</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/product/">



    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .delete-checkbox{
            
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./css/product.css" rel="stylesheet">
</head>
<body>



<main>
    
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        

    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="">
                <div class="">
                    <h1 class="display-4 fw-normal">Products List</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-items-baseline">
            <div class="float-end">
                    <a href="AddProduct.php" class="btn btn-primary">ADD</a>
                    <button class="btn btn-danger" id='delete' name="massDelete">MASS DELETE</button></br>
                </div>
        </div>
        <hr>
        <?php
        $products = $show->show_products();
      
        while($product = mysqli_fetch_array($products, MYSQLI_ASSOC)){
              //$delete->delete_selected();
              

        ?>
        <div class="col-md-3">
            <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white ">
                <div class="d-flex">
                    <input type="checkbox" class="delete-checkbox form-check-input" name="checkbox[]" value="<?php echo $product['sku'] ?>" id="checkbox">
                </div>
                <div class="my-3 py-3">
                    <h2 class="display-5"><?php echo $product['name'] ?></h2>
                    <p class="lead"><?php
                        if($product['type'] == 'DVD'){
                            echo "Product Type: ".$product['type']. "</br>";
                            echo "Size: " .$product['sizeDVD']. " MB</br>";
                            echo "Price: $".$product['price'];
                        }elseif ($product['type'] == 'Furniture'){
                            echo "Product Type: ".$product['type']. "</br>";
                            echo "Height: " .$product['heightFuniture']. " Centimetres</br>";
                            echo "Width: " .$product['widthFuniture']. " Centimetres</br>";
                            echo "Length: " .$product['lengthFuniture']. " Centimetres</br>";
                            echo "Price: $".$product['price'];
                        }elseif($product['type'] == 'Book'){
                            echo "Product Type: ".$product['type']. " </br>";
                            echo "Book: ".$product['bookWeight']. "KG</br>";
                            echo "Price: $".$product['price'];
                        }

                        ?></p>
                </div>
<!--                <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>-->
            </div>
        </div>
        <?php
        }

        ?>


    </div>
</form>
    <p id="test"></p>

</main>




<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./jquery/jquery.js"></script>
<script>
    $(document).ready(function(){

        $('#delete').click(function(){
            var checked = $('.delete-checkbox:checked');

            if(checked.length > 0){
                var checked_value = []
                $(checked).each(function(){
                    checked_value.push($(this).val());
                });


            }

            $.post(
                "delete.php",
                {
                    checked_values: checked_value
                },

            )
                .done(
                    function (data){
                        alert("Deleted successfully");
                    }
                );
        });
    });

</script>

</body>
</html>
