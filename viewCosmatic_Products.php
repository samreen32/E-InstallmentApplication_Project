<?php
    session_start();
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
    <link rel="stylesheet" type="text/css" href="lightbox2/dist/css/lightbox.min.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Customer Installment-Application</title>

    <style>
    .img-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        padding: 10px;
    }

    .image {
        height: 170px;
        width: 170px;
        border: 1px solid #fff;
        box-shadow: 0 5px 15px rgb(0, 0, 0, .1);
        overflow: hidden;
        cursor: pointer;
    }

    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: .2s linear;
    }

    .image:hover img {
        filter: drop-shadow(4px 4px 6px gray);
        transform: scale(1.1);
    }

    .popup-img {
        position: fixed;
        top: 14.5%;
        left: 0;
        background: rgb(0, 0, 0, .9);
        height: 86%;
        width: 100%;
        z-index: 100;
        display: none;
    }

    .popup-img span {
        position: absolute;
        top: 0;
        right: 10px;
        font-size: 60px;
        font-weight: bolder;
        color: white;
        cursor: pointer;
        z-index: 100;
    }

    .popup-img img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 5px solid #fff;
        border-radius: 5px;
        width: 750px;
        object-fit: cover;
    }

    @media(max-width: 768px) {
        .popup-img img {
            width: 95%;
        }
    }
    </style>
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
                    <a class="navbar-brand nav__logo mx-5" href="#">Cosmatic Products</a>
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
                                Welcome! <?php echo $_SESSION['user_name'] ?></a>
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
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Highlights</h5>
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
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-plus img-fluid mx-2 button__icon" aria-hidden="true"></i>Add Products for
                            installment</a>
                        <a type="button" class="button button--flex my-3" href="addForm.php"
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



    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="container my-5" style="background-color: #9575CD; 
        align-self: center; text-align: center;">
            <div style="margin-top: 100px;">
                <span style="color: white;">
                    <h2>Cosmatic Products for Installment</h2>
                </span>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 my-4">
                <div class="col">
                    <div class="card modal-body">
                        <div class="img-container">
                            <div class="image">
                                <img src="./assets/img/makeup.jpg" style="width: 150px; height: 150px; margin-top: 10px;
                                align-self: center" class="card-img-top" data-index="7" alt="...">
                            </div>
                        </div>
                        <div class="popup-img">
                            <span>&times;</span>
                            <img src="./assets/img/makeup.jpg" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Makeup Kit</h5>
                            <p class="card-text">Makeup Kit you want now in installments:
                            <ul>
                                <li><i>Water Proof.</li>
                                <li>High Resistant.</li>
                                <li>Resist Moisture .</li>
                                <li>Adhesive Film Formers.</li>
                                </i>
                            </ul>
                            </p>
                            <h6 class="card-title">Category: Cosmetics</h6>
                            <a type="button" class="button button--flex" style="height: 40px; align-self: center">Add
                                for Installment</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card modal-body">
                        <div class="img-container">
                            <div class="image">
                                <img src="./assets/img/eyeKit.jpg" style="width: 150px; height: 150px; 
                                margin-top: 10px; align-self: center" class="card-img-top" data-index="8" alt="...">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Eye Kit</h5>
                            <p class="card-text">Your faviote eye makeup kit is now on installments:
                            <ul>
                                <li><i>Water Proof.</li>
                                <li>High Resistant.</li>
                                <li>Resist Moisture .</li>
                                <li>Adhesive Film Formers.</li>
                                </i>
                            </ul>
                            </p>
                            <h6 class="card-title">Category: Cosmatic</h6>
                            <a type="button" class="button button--flex" style="height: 40px; align-self: center">Add
                                for Installment</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a type="button" class="button button--flex mx-3 my-3" href="viewProduct_Category.php" style="height: 40px;">Back</a>
    </div>


    </div>
    </div>
    </div>

</body>

<!--Product Selecting -->
<script>
document.querySelectorAll('.img-container img').forEach(image => {
    image.onclick = () => {
        document.querySelector('.popup-img').style.display = 'block';
        document.querySelector('.popup-img img').src = image.getAttribute('src');
    }
});
document.querySelector('.popup-img span').onclick = () => {
    document.querySelector('.popup-img').style.display = 'none';
}
</script>


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

</html>