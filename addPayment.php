<?php

require("user_timestamp.php");
 require_once('database.php');
 if(isset($_REQUEST['add_payment']) && isset($_FILES['product_img'])){
	 
     $fname = $database->sanitize($_POST['fname']);
     $product_name = $database->sanitize($_POST['product_name']);
     $installment_plan = $database->sanitize($_POST['installment_plan']);
     $payment_status = $database->sanitize($_POST['payment_status']);
     $product_img = $database->sanitize($_FILES['product_img']['name']);
     $tmp_name = $_FILES['product_img']['tmp_name'];
 
	 $res = $database->addPayment($fname, $product_name, $product_img, $installment_plan, $payment_status);
	 if($res){
        move_uploaded_file($tmp_name, "upload/".$product_img);
        $_SESSION['status'] = "Payment Details added Successfully.";
	 }else{
        $_SESSION['status'] = "Failed to add";
	 }
}
?>

<?php
     $view_cust = $database->viewCustomers();
     $view_product = $database->viewProducts();
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
                        <a type="button" style="color: white;" href="viewPayment.php">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                        <a class="navbar-brand nav__logo mx-3 my-1" href="#">Add Payment Details</a>
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
                        <strong>Success!</strong><?php echo " ".$_SESSION['status']; ?>
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
                                    <h3 style="color: black; text-align: center">Add Payment Details</h3><br /><br />
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fname">Customer Name</label>
                                            <select class="form-control" id="fname" name="fname">
                                                <option value="">Select Name...</option>
                                                <?php 
                                                    while($row = mysqli_fetch_assoc($view_cust)){
                                                        $k = $row['id'];
                                                        $key = $row['fname'];
                                                        echo '<option value="'.$key.'">'.$key.'</option>';
                                                ?>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cur_date_time">Current Date/Time</label>
                                            <input type="text" class="form-control" name="cur_date_time"
                                                id="cur_date_time"
                                                value=" <?php date_default_timezone_set('Asia/Karachi'); $date = date('F j, Y, g:i a', time()); echo $date;?>"
                                                readonly="readonly">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Product Name</label>
                                            <select class="form-control" id="product_name" name="product_name">
                                                <option value="">Select Product...</option>
                                                <?php 
                                                    while($r = mysqli_fetch_assoc($view_product)){
                                                        $k = $r['id'];
                                                        $key = $r['product_name'];
                                                        echo '<option value="'.$key.'">'.$key.'</option>';
                                                ?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="product_img">Product Image</label>
                                            <input type="file" class="form-control" name="product_img" id="product_img">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="my-1 mr-2" for="installment_plan">Installment Plan(Months)</label>
                                            <select class="form-control" id="installment_plan" name="installment_plan">
                                                <option selected>Choose Months...</option>
                                                <option value="1">1 Month</option>
                                                <option value="2">2 Months</option>
                                                <option value="3">3 Months</option>
                                                <option value="4">4 Months</option>
                                                <option value="5">5 Months</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="my-1 mr-2" for="payment_status">Payment Status</label>
                                            <select class="form-control" id="payment_status" name="payment_status">
                                                <option selected>Choose...</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Unpaid">Unpaid</option>
                                            </select>
                                        </div>
                                    </div>


                                    <button type="submit" style="display: flex; margin: auto;"
                                        class="button button--flex my-4" name="add_payment">Add
                                         Details</button>
                                </form>
                            </div><br>
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