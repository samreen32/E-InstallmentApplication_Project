<?php
    require("user_timestamp.php");
    require_once('database.php');
    $res = $database->viewCustomers();
?>


<?php



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
                    <a class="navbar-brand nav__logo mx-5" href="#">Customer Details</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <form class="d-flex" role="search" style="margin-left: 100px; width: 500px">
                                <input class="form-control me-5" style="text-align: center;" type="text" id="search"
                                    name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                                <i class="ri-search-line ri-xl my-3" style="margin-left: -45px"></i>
                            </form>
                        </ul>
                        <span style="margin-right: 40px">
                            <a style="cursor: pointer;"><i class="fa fa-user fa-2x img-fluid mx-3 button__icon"
                                    aria-hidden="true"></i>
                                Welcome! <?php echo $_SESSION['user_name'] ?></a>
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
                    <h2>Customer Details</h2>
                </span>
            </div>
            <div class="row row-header my-3">
                <div class="card modal-body" style="width: 90rem;">
                    <div class="my-5 mx-3">
                        <div class="row">
                            
                            <table class="table" id="livesearch">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Other Detais</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php 
                                    while($r = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo $r['title']; ?></td>
                                    <td><?php echo $r['fname']; ?></td>
                                    <td><?php echo $r['lname']; ?></td>
                                    <td><?php echo $r['gender']; ?></td>
                                    <td><?php echo $r['address']; ?></td>
                                    <td><?php echo $r['city']; ?></td>
                                    <td><?php echo $r['state']; ?></td>
                                    <td><?php echo $r['zip']; ?></td>
                                    <td><?php echo $r['other_details']; ?></td>

                                    <td>
                                        <a type="button" class="btn btn-primary col-md-12"
                                            style="height: 40px; text-align: center; background-color: #512da8"
                                            href="updateCustomer.php?id=<?php echo $r['id']; ?>">
                                            <i class="fa fa-pencil-square img-fluid mx-2 button__icon"
                                                aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger col-md-12"
                                            href="deleteCustomer.php?id=<?php echo $r['id']; ?>"><i
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="jquery-3.6.3.js"></script>


<script>
$(document).ready(function() {
    $("#search").keyup(function() {
        var search_term = $(this).val();
        //alert(search_term);

        $.ajax({
            url: "cust_live_search.php",
            method: "POST",
            data: {
                search_term: search_term
            },
            success: function(data) {
                $("#livesearch").html(data);
                //alert(data);
            }
        });
    });
});
</script>




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