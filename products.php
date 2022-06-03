<?php
require_once 'connection.php';
$operation = new operations();

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


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


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
                    <button type="submit" class="btn btn-danger" name="massDelete">MASS DELETE</button></br>
                </div>
        </div>
        <hr>
        <?php
        $products = $operation->show_products();
      
        while($product = mysqli_fetch_array($products, MYSQLI_ASSOC)){
              $operation->delete_selected();

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

</main>




<script src="./js/bootstrap.bundle.min.js"></script>
<script src="jquery/jquery.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>

</script>


</body>
</html>
