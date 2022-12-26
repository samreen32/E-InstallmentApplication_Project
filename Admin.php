<?php
    require("user_timestamp.php");
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
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                            aria-controls="offcanvasWithBothOptions">
                            <i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
                    </span>
                    <a class="navbar-brand nav__logo mx-5" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <form class="d-flex" role="search" style="margin-left: 100px; width: 500px">
                                <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
                                <i class="ri-search-line ri-xl my-3" style="margin-left: -45px"></i>
                            </form>
                        </ul>
                        <span style="margin-right: 40px">
                            <a style="cursor: pointer;"><i class="fa fa-user fa-2x img-fluid mx-3 button__icon"
                                    aria-hidden="true"></i>
                                Welcome! <?php 
                                echo $_SESSION['user_name'] 
                                ?></a>
                        </span>
                    </div>
                </div>
            </nav>
        </div>
    </div>


    <!-- Drawer -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header" style="background-color: #512da8; color: white;">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" style="background-color: white;"
                aria-label="Close"></button>
        </div>
       
        <div class="offcanvas-body">
            <div class="col">
                <div class="card modal-body">
                    <div class="card-body">
                 
                        <a type="button" class="button button--flex my-3 button__icon" 
                            href="profile.php" style="height: 50px; width:100%;">
                            <i class="fa fa-user img-fluid mx-2 button__icon" aria-hidden="true"></i>
                            Profile</a>
                  
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;" href="viewProduct.php"><i
                        class="fa fa-eye img-fluid mx-2 button__icon" aria-hidden="true"></i>View Products</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;" href="addProducts.php"><i
                                class="fa fa-plus img-fluid mx-2 button__icon" aria-hidden="true"></i>Add Products
                            </a>
                        <a type="button" class="button button--flex my-3" href="addCustomer.php"
                            style="height: 50px; width:100%;"><i class="fa fa-plus img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>
                            Add Customers</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; 
                                width:100%;"><i class="fa fa-eye img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>View
                            Customer Details</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-pencil-square img-fluid mx-2 button__icon" aria-hidden="true"></i>Update
                            Installments</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-trash img-fluid mx-2 button__icon" aria-hidden="true"></i>Remove
                            Installments</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-cogs img-fluid mx-2 button__icon" aria-hidden="true"></i>Settings</a>
                        <a type="button" class="button button--flex my-3"
                            style="height: 50px; cursor: pointer; width:100%;" href="logout.php"><i
                                class="fa fa-sign-out img-fluid mx-2 button__icon" aria-hidden="true"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <?php //} ?>


    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="row my-5">
            <div class="col" style="margin-top: 80px;">
                <div class="col mx-5">
                    <div class="row row-header my-3">
                        <div class="col-12 col-sm-6">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">Customers</h5>
                                    <p class="card-text">54</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">Installments</h5>
                                    <p class="card-text">50</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">Products available for installment</h5>
                                    <p class="card-text">65</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">Add new installment</h5>
                                    <p class="card-text">new</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">Statistics</h5>
                                    <p class="card-text">new</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card modal-body">
                                <a class="card-body">
                                    <h5 class="card-title">logout</h5>
                                    <p class="card-text">new</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a type="button" class="button button--flex mx-3 my-3" href="Main.php" style="height: 40px;">Back</a>
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
<!-- <script src="cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>

<script>
    setInterval(function() {
        check_user();
    }, 2000);
function check_user(){
    jQuery.ajax({
        url: 'user_timestamp.php',
        type: 'post',
        data: 'type=ajax',
        success: function(result){
           if(result == 'logout'){
            window.location.href='logout.php';
           }
        }
    })
} -->

</script>

</html>