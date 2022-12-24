<?php
session_start();

 require_once('database.php');
 if(isset($_REQUEST['add_product']) && isset($_FILES['product_img'])){

	 $product_name = $database->sanitize($_POST['product_name']);
     $product_price = $database->sanitize($_POST['product_price']);
     $product_category = $database->sanitize($_POST['product_category']);
     $product_descr = $database->sanitize($_POST['product_descr']);
	 $product_img = $database->sanitize($_FILES['product_img']['name']);
     $tmp_name = $_FILES['product_img']['tmp_name'];

    $res = $database->addProduct($product_name, $product_price, $product_img, $product_category, $product_descr);
    if($res){
        move_uploaded_file($tmp_name, "upload/".$product_img);
        $_SESSION['status'] = "<h6>Product add succcessfully.</h6>";
        
    }else{
        $_SESSION['status'] = "<h6>Product does not added.</h6>";
        
    }

}
     

 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Customer Installment-Application</title>


</head>


<body>


    <!-- header -->
    <div class="container my-5">
        <div class="nav__bar">
            <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
                <div class="container-fluid my-3" style="margin-left: 30px;">
                    <span style="margin-left: 20px">
                        <a type="button" style="color: white;" href="./viewProduct.php">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                        <a class="navbar-brand nav__logo mx-3 my-1" href="#">Add Products</a>
                    </span>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
            </nav>
        </div>
    </div>


    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="row my-5">
            <div class="col my-3">
                <div class="col">
                    <?php
                        if(isset($_SESSION['status']) && $_SESSION != ''){ 
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong><?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <?php 
                       unset($_SESSION['status']); 
                        } 
                    ?>

                    <div class="row row-header my-3">
                        <div class="card modal-body" style="width: 90rem;">
                            <div class="my-5 mx-3">

                                <form method="post" enctype="multipart/form-data">
                                    <h4 style="color: black; text-align: center">Add Product Details</h4><br />
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" class="form-control" id="product_name"
                                                name="product_name" placeholder="e.g. Heater">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cur_date_time">Date/Time of adding Product</label>
                                            <input type="text" class="form-control" name="cur_date_time"
                                                id="cur_date_time"
                                                value=" <?php date_default_timezone_set('Asia/Karachi'); $date = date('F j, Y, g:i a', time()); echo $date;?>"
                                                readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="product_price">Product Price</label>
                                            <input class="form-control" id="product_price" rows="3"
                                                placeholder="e.g. 1500/" name="product_price" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="my-1 mr-2" for="product_category">Product Category</label>
                                            <select class="form-control" id="product_category" name="product_category">
                                                <option selected>Choose...</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Furniture">Furniture</option>
                                                <option value="Cosmatic">Cosmatic</option>
                                                <option value="Clothing">Clothing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="product_img">Product Image</label>
                                        <input type="file" class="form-control" name="product_img" id="product_img">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_descr">Product Description</label>
                                        <textarea class="form-control" id="product_descr" rows="3"
                                            placeholder="e.g. One Piece" name="product_descr"></textarea>
                                    </div>
                                    <button type="submit" style="display: flex; margin: auto;"
                                        class="button button--flex my-4" name="add_product">Add
                                        Product</button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="assets/js/scripts.js"></script>


</html>