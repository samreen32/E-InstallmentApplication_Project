<?php

require("user_timestamp.php");
 require_once('database.php');
 $id = $_GET['id'];
 $res = $database->viewCustomers($id);
 $r = mysqli_fetch_assoc($res);

 if(isset($_REQUEST['update_customer'])){
	 $title = $database->sanitize($_POST['title']);
     $fname = $database->sanitize($_POST['fname']);
	 $lname = $database->sanitize($_POST['lname']);
	 $gender = $_POST['gender'];
	 $address =  $database->sanitize($_POST['address']);
     $city = $_POST['city'];
     $state = $_POST['state'];
     $zip = $_POST['zip'];
     $other_details = $_POST['other_details'];
 
	 $res = $database->updateCustomer($title, $fname, $lname, $gender, $address, $city, $state, $zip, $other_details, $id);
	 if($res){
        $_SESSION['status'] = "Customer Updated Successfully.";
	 }else{
        $_SESSION['status'] = "Failed to update.";
	 }
}
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
                        <a type="button" style="color: white;" href="viewCustomer.php">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                        <a class="navbar-brand nav__logo mx-3 my-1" href="#">Edit Customer Details</a>
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
                                <h3 style="color: black; text-align: center">Edit Customer Details</h3><br /><br />
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="my-1 mr-2" for="title">Title</label>
                                            <select class="form-control" id="title" name="title">
                                                <option selected>Choose...</option>
                                                <option value="Mr." <?php if($r['title'] == 'Mr.'){ echo "selected";} ?>>Mr.</option>
                                                <option value="Miss" <?php if($r['title'] == 'Miss'){ echo "selected";} ?>>Miss</option>
                                                <option value="Mrs" <?php if($r['title'] == 'Mrs'){ echo "selected";} ?>>Mrs</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname"
                                                placeholder="e.g. Samreen" value="<?php echo $r['fname'] ?>">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname"
                                                placeholder="e.g. Karim" value="<?php echo $r['lname'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mx-2">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Select Gender</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="male" value="Male" <?php if($r['gender'] == 'Male'){ echo "checked";} ?>>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="female" value="Female" <?php if($r['gender'] == 'Female'){ echo "checked";} ?>>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="e.g. 1234 Main St" value="<?php echo $r['address'] ?>">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="e.g. Islamabad" value="<?php echo $r['city'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="state">State</label>
                                            <select id="state" class="form-control" name="state">
                                                <option selected>Choose...</option>
                                                <option <?php if($r['state'] == 'Pakistan'){ echo "selected";} ?>>Pakistan</option>
                                                <option <?php if($r['state'] == 'Turkey'){ echo "selected";} ?>>Turkey</option>
                                                <option <?php if($r['state'] == 'Korea'){ echo "selected";} ?>>Korea</option>
                                                <option <?php if($r['state'] == 'Nepal'){ echo "selected";} ?>>Nepal</option>
                                                <option <?php if($r['state'] == 'USA'){ echo "selected";} ?>>USA</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" name="zip"
                                                placeholder="e.g. 8000" value="<?php echo $r['zip'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="other_details">Any Other Detail</label>
                                        <textarea class="form-control" id="other_details" rows="3"
                                            placeholder="e.g. any other information" name="other_details"><?php echo $r['other_details'] ?></textarea>
                                    </div><br />
                                    
                                    <button type="submit" style="display: flex; margin: auto;"
                                        class="button button--flex" name="update_customer">Update
                                        Customer</button>
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
function check_user(id){
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'user_timestamp.php',
        dataType: 'html',
        data:{ id:id },
        success: function(response){
           if(response == 'logout'){
            window.location.href='logout.php';
           }
        }
    });
}

</script>
</html>