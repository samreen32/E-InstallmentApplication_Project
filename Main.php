<?php
$showAlert = false;
$showError = false;
require_once('database.php');
if(isset($_POST) & !empty($_POST)){
    
    $fname = $database->sanitize($_POST['fname']);
    $email = $database->sanitize($_POST['email']);
    $password = $database->sanitize($_POST['password']);
    $cPassword = $_POST['cPassword'];          
 
    //check whethere email already exists or not.
    $result = $database->emailValidation($email);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Email already exists.";
    }
    else{
        if(($password == $cPassword) && (!empty($_POST["fname"])) && (!empty($_POST["email"]))){
            $res = $database->createSignup($fname, $email, $password);
            if($res){
            $showAlert = true;
            }
        }
        else{
            $showError = true;
        }
    }
}
?>

<!--login-->
<?php
$login = false;
$showError = false;
require_once('database.php');
if(isset($_POST) & !empty($_POST)){
    
    $fname = $database->sanitize($_POST['fname']);

    $res = $database->createLogin($fname);
    $num = mysqli_num_rows($res);
    if($num == 1){
        while($rows = mysqli_fetch_assoc($res)){
            if(password_verify($password, $rows['password'])){      //verify given hash matches the given password.
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                // $_SESSION["id"] = $id;
                $_SESSION['fname'] = $fname;
                header("location: Admin.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
    }
    else{
        $showError = "Invalid Credentials";
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
    <div class="nav__bar">
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container-fluid my-3" style="margin-left: 30px;">
                <a class="navbar-brand nav__logo" href="#">E-INSTALLMENT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active my-2 nav__link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown my-2">
                            <a class="nav-link dropdown-toggle nav__link" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu modal-body">
                                <li><a class="dropdown-item" href="#">About</a></li>
                                <li><a class="dropdown-item" href="#">Contact Us</a></li>
                                <li><a class="dropdown-item" href="#">Installment Plans</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Help</a></li>
                            </ul>
                        </li>
                        <form class="d-flex" role="search" style="margin-left: 100px; width: 500px">
                            <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
                            <i class="ri-search-line ri-xl my-3" style="margin-left: -45px"></i>
                        </form>
                    </ul>

                    <span style="margin-right: 40px" data-toggle="modal" data-target="#exampleModalCenter">
                        <a style="cursor: pointer;"> <span
                                class="fa fa-sign-in fa-lg mx-2 button__icon"></span>Login</a>
                    </span>
                    <span style="margin-right: 40px" data-toggle="modal" data-target="#exampleModalCenter1">
                        <a style="cursor: pointer;"> <span class="fa fa-sign-in fa-lg mx-2 button__icon"></span>Sign
                            Up</a>
                    </span>
                </div>
            </div>
        </nav>
    </div>

    <!-- Modal Login-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>

                <?php
                    //Alert for successful login
                    if($login){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> You have been logged in.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    //Alert when passwords do not match as well as any field is empty.
                    if($showError){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops!</strong> '.$showError.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                ?>

                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="fname" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                aria-describedby="emailHelp">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                             required aria-describedby="emailHelp">
                        </div> -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div style="align-items: left;">
                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <input type="submit" style="background-color: #512da8; color: #fff; height: 40px; text-align: center;
                             padding: 0.4rem 1.75rem; border-radius: 0.5rem; transition: 0.3s;" value="Login"
                               />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register-->
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Account</h5>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>

                <?php
                    //Alert for successful signup
                    if($showAlert){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your account has been created.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    //Alert when passwords do not match as well as any field is empty.
                    if($showError){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops!</strong> '.$showError.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                ?>


                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="fname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" required
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="cPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cPassword" name="cPassword" required>
                        </div>
                        <div class="">
                            <input type="submit" style="background-color: #512da8; color: #fff;
                             padding: 0.4rem 1.75rem; border-radius: 0.5rem; transition: 0.3s;" value="Sign up"
                                style="height: 40px;" />
                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <header class="jumbotron">
        <div class="row row-header">
            <div class="col-12 col-sm align-self-center">
                <img src="./assets/img/loan.png" style="width: 200px;" class="img-fluid">
            </div>
            <div class="col-12 col-sm-4 align-self-center" style="margin-right: 600px;">
                <h1>Don't have money? Totally fine you
                    can pay later.</h1>

                <p>Create your account so we take good care of your installments in the future!!</p>
                <a type="button" class="button button--flex nav-link btn-warning text-white" id="plans">Explore
                    Installment Plans<i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>
        </div>
    </header>


    <!-- Body -->
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4" id="plansCard">
            <div class="col">
                <div class="card modal-body">
                    <img style="width: 100px; height: 100px; align-self: center;  margin-top: 10px;"
                        src="./assets/img/statistics.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Daily Plans</h5>
                        <p class="card-text">Daily payment loans can be lumped into the general category of short-term
                            business loans for small cash infusions paid back in a relatively short amount of time-
                            short-term business loans that make it
                            all possible.</p>
                        <a type="button" class="button button--flex" style="height: 40px; align-self: center">Explore
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card modal-body">
                    <img src="./assets/img/business-report.png" style="width: 100px; height: 100px;  margin-top: 10px;
                    align-self: center" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Weekly Plans</h5>
                        <p class="card-text">We are now offering convenient weekly payments. This payment plan requires
                            customers to save a credit card-on-file. You will not automatically be subscribed to future
                            seasons.</p>
                        <a type="button" class="button button--flex" style="height: 40px; align-self: center">Explore
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card modal-body">
                    <img src="./assets/img/analysis.png" style="width: 100px; height: 100px; margin-top: 10px;
                    align-self: center" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Plans</h5>
                        <p class="card-text">An equated monthly installment is a fixed payment made by a borrower
                            to a lender on a specified date of each month- are applied to both interest and
                            principal each month so that over a specified time period, the loan is paid off in full.</p>
                        <a type="button" class="button button--flex" style="height: 40px; align-self: center">Explore
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card modal-body">
                    <img src="./assets/img/bar-chart.png" style="width: 100px; height: 100px; 
                    margin-top: 10px; align-self: center" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Yearly Plans</h5>
                        <p class="card-text">Annual Installments means a series of amounts to be paid annually over a
                            predetermined period of years except to the extent
                            any increase in the amount reflects reasonable earnings through the date the amount is
                            paid.</p>
                        <a type="button" class="button button--flex" style="height: 40px; align-self: center">Explore
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h4>Links</h4>
                    <ul class="list-unstyled" style="color: white;">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Plans</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                        121, University Road <br>
                        H-9, Islambad<br>
                        PAKISTAN<br>
                        <i class="fa fa-phone fa-lg"></i>: +852 1234 5678<br>
                        <i class="fa fa-fax fa-lg"></i>: +852 8765 4321<br>
                        <i class="fa fa-envelope fa-lg"></i>:
                        <a href="mailto:e-installment@gmail.com">e-installment@gmail.com</a>
                    </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i
                                class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i
                                class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i
                                class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i
                                class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i
                                class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© Copyright 2021 E-Installment</p>
                </div>
            </div>
        </div>
    </footer>






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