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

                        <a type="button" class="button button--flex my-3 button__icon" href="profile.php"
                            style="height: 50px; width:100%;">
                            <i class="fa fa-user img-fluid mx-2 button__icon" aria-hidden="true"></i>
                            Profile</a>

                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"
                            href="addProducts.php"><i class="fa fa-plus img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>Add Products
                        </a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"
                            href="viewProduct.php"><i class="fa fa-eye img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>View Products</a>
                        <a type="button" class="button button--flex my-3" href="addCustomer.php"
                            style="height: 50px; width:100%;"><i class="fa fa-plus img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>
                            Add Customers</a>
                        <a type="button" class="button button--flex my-3" href="viewCustomer.php" style="height: 50px; 
                                width:100%;"><i class="fa fa-eye img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>View
                            Customers</a>
                        <a type="button" class="button button--flex my-3 button__icon" href="installment_Quote.php"
                            style="height: 50px; width:100%;">
                            <i class="fa fa-leanpub img-fluid mx-2 button__icon" aria-hidden="true"></i>
                            Add Quotation</a>
                        <a type="button" class="button button--flex my-3" href="addPayment.php"
                            style="height: 50px; width:100%;"><i class="fa fa-credit-card-alt mx-2 button__icon"
                                aria-hidden="true"></i>
                            Payment</a>
                        <a type="button" class="button button--flex my-3" href="viewPayment.php" style="height: 50px; 
                                width:100%;"><i class="fa fa-eye img-fluid mx-2 button__icon"
                                aria-hidden="true"></i>View Payments</a>
                      
                      
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

<script src="jquery-3.6.3.js"></script>



</html>