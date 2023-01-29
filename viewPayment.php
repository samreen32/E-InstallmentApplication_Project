<?php
    require("user_timestamp.php");

    require_once('database.php');
    $res = $database->viewPayment();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="refresh" content="900;url=logout.php" /> -->

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="lightbox2/dist/css/lightbox.min.css">
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
                    <a class="navbar-brand nav__logo mx-5" href="#">Payment Details</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <span style="margin-left: 780px">
                            <a style="cursor: pointer; color: white" href="Admin.php">
                                <i class="fa fa-user fa-2x img-fluid mx-3 button__icon"
                                    aria-hidden="true"></i>Dashboard</a>
                        </span>

                    </div>
                </div>
            </nav>
        </div>
    </div>



    <?php include("Drawer.php") ?>


    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="container my-5" style="background-color: #9575CD; 
            align-self: center; text-align: center;">
            <div style="margin-top: 100px;">
                <?php
                    if(isset($_SESSION['status']) && $_SESSION != ''){ 
                ?>
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>Success!</strong><?php echo " ".$_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php 
                    unset($_SESSION['status']); 
                    } 
                ?>
                <span style="color: white;">
                    <h2>Payment Details</h2>
                </span>
            </div>

            <div class="row row-header my-3">
                <div class="card modal-body" style="width: 90rem;">
                    <div class="my-5 mx-3">
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Customer Name</th>
                                    <th>Installment Plan(Months)</th>
                                    <th>Status</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php 
                                    while($r = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td>
                                        <div class="image">
                                            <img style="width: 150px; height: 150px; align-self: center;  margin-top: 10px;"
                                                src="<?php echo "upload/". $r['product_img']; ?>" class="card-img-top"
                                                data-index="1" alt="...">
                                        </div>
                                    </td>
                                    <td><?php echo $r['product_name']; ?></td>
                                    <td><?php echo $r['fname']; ?></td>
                                    <td><?php echo $r['installment_plan']; ?></td>
                                    <td><?php echo $r['payment_status']; ?></td>
                                    <td>
                                        <a class="btn btn-success col-md-12"
                                            href="installment_Quote.php?id=<?php echo $r['id']; ?>"><i
                                                class="fa fa-leanpub img-fluid mx-2 button__icon"
                                                aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-primary col-md-12"
                                            href="updatePayment.php?id=<?php echo $r['id']; ?>"
                                            style="height: 40px; text-align: center; background-color: #512da8">
                                            <i class="fa fa-pencil-square img-fluid mx-2 button__icon"
                                                aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger col-md-12"
                                            href="deletePayment.php?id=<?php echo $r['id']; ?>"><i
                                                class="fa fa-trash img-fluid mx-2 button__icon"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <a type="button" class="button button--flex mx-3 my-3" href="Admin.php" style="height: 40px;">Back</a>
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
<script src="lightbox2/dist/js/lightbox-plus-jquery.min.js">
</script>

<script src="jquery-3.6.3.js"></script>

<script>
$(document).ready(function() {
    setInterval(function() {
        check_user(1);
    }, 500);
});

function check_user(id) {
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'user_timestamp.php',
        dataType: 'html',
        data: {
            id: id
        },
        success: function(response) {
            if (response == 'logout') {
                window.location.href = 'logout.php';
            }
        }
    });
}
</script>

</html>