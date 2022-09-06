<?php
require_once ('connection.php');

$operationtest = new storeProducts();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-1 mx-auto my-0">
        <h1 class="display-4 fw-normal">Products Add</h1>
    </div>

</div>
<div class="container">
    <?php  $operationtest->store_products() ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="product_form">


        <div class="col-md-6">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="price">Price ($)</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="productType">Type Switcher</label>
            <select name="typeswitcher" id="productType" class="form-control" required>
                <option hidden>Select The Type</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select>
        </div>



       <div id="DVD" class="remove">
           <div class="col-md-6">
               <label for="price">Size Of DVD</label>
               <input type="number" name="size" id="size" class="form-control">
           </div>
       </div>
       <div class="remove col-md-6" id="furniture">
           <label for="height">Height</label>
           <input type="number" name="height" id="height"  placeholder="Height in Centimetres"  class="form-control">
           <label for="width">Width</label>
           <input type="number" name="width" id="width" placeholder="Width in Centimetres"  class="form-control">
           <label for="length">Length</label>
           <input type="number" name="length" id="length"  placeholder="Length in Centimetres" class="form-control">
       </div>
        <div class="remove col-md-6" id="book">
            <label for="weight">Weight(kg)</label>
            <input type="number" name="weight" id="weight" class="form-control">
        </div>
        <div class="float-end">
            <input type="submit" class="btn btn-primary"  value="Save" name="Submit">
            <a href="products.php" class="btn btn-danger">Cancel</a>
        </div>


    </form>
    
</div>
<style>
    .remove{
        display: none;
    }
</style>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="./jquery/jquery.js"></script>
<script>
    $('#productType').change(function (){
        var selected_type = $(this).val()

        if (selected_type == 'DVD'){
            $('#DVD').removeClass('remove')
        }else{
            $('#DVD').addClass('remove')
        }
        if (selected_type == 'Furniture'){
            $('#furniture').removeClass('remove')
        }else{
            $('#furniture').addClass('remove')
        }
        if (selected_type == 'Book'){
            $('#book').removeClass('remove')
        }else{
            $('#book').addClass('remove')
        }

        //submit form

    })
</script>
</body>
</html>