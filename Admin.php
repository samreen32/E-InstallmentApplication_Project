<?php
    require("user_timestamp.php");
    require_once('database.php');
    $count_cust = $database->viewCustomers();
    $count_product = $database->viewProducts();
    $count_insta = $database->viewPayment();
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

    <style>
    /* dashboard divs */
    .questions__header {
        display: flex;
        align-items: center;
        column-gap: .5rem;
        padding: 1.75rem 1.5rem;
        cursor: pointer;
        height : 5.6rem;
    }

    .questions__icon {
        font-size: 1.5rem;
    }

    .questions__content {
        overflow: hidden;
        height: 0;
    }

    .questions__description {
        font-size: 1.15rem;
        padding: 0 1.25rem 1.25rem 2.5rem;
    }

    .questions__header,
    .questions__icon,
    .questions__description,
    .questions__content {
        transition: .3s;

    }

    .accordion-open .questions__header,
    .accordion-open .questions__content {
        background-color: #d1c4e9;
        color: black;
    }

    .accordion-open .questions__description,
    .accordion-open .questions__icon {
        color: black;
    }

    .accordion-open .questions__icon {
        transform: rotate(45deg);
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
                    <a class="navbar-brand nav__logo mx-5" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <form class="d-flex" role="search" style="margin-left: 100px; width: 500px">
                                <input class="form-control me-5 mx-5" style="text-align: center;" type="search"
                                    placeholder="Search" aria-label="Search">
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

    <?php include("Drawer.php") ?>

    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="row my-5">
            <div class="col" style="margin-top: 80px;">
                <div class="col mx-5 ">
                    <div class="row row-header my-3 questions__group">
                        <div class="col-12 col-sm-6 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">Customers</h5>
                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        <?php $r = mysqli_num_rows($count_cust) ?>
                                        <?php echo $r; ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">Installments</h5>
                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        <?php $r = mysqli_num_rows($count_insta) ?>
                                        <?php echo $r; ?></p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 my-3 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">Products available for installment</h5>
                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        <?php $r = mysqli_num_rows($count_product) ?>
                                        <?php echo $r; ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 my-3 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">Add new installment</h5>

                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        new</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">Statistics</h5>

                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        new</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 questions__item">
                            <div class="card" style="background-color: #512da8; color: white;">
                                <a class="card-body questions__header">
                                    <i class="ri-add-line questions__icon"></i>
                                    <h5 class="card-title">logout</h5>

                                </a>
                                <div class="questions__content">
                                    <p class="questions__description">
                                        new</p>

                                </div>
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

<script>
/*=============== Dashboard ===============*/
const accordionItems = document.querySelectorAll('.questions__item')

accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.questions__header')

    accordionHeader.addEventListener('click', () => {
        const openItem = document.querySelector('.accordion-open')
        toggleItem(item)
        if (openItem && openItem !== item) {
            toggleItem(openItem)
        }
    })
})
const toggleItem = (item) => {
    const accordionContent = item.querySelector('.questions__content')

    if (item.classList.contains('accordion-open')) {
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    } else {
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }

}

const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 400,
})

sr.reveal(`.questions__group `, {
    interval: 100
})
</script>

</html>