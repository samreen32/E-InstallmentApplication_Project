<?php
    require("user_timestamp.php");
    require_once('database.php');
    $id = $_GET['id'];
    $res = $database->viewCustomers($id);
    $r = mysqli_fetch_assoc($res);

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
                        <a class="navbar-brand nav__logo mx-3 my-1" href="#">Installment Quotation</a>
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

                    <div class="row row-header my-3">
                        <div class="card modal-body" style="width: 90rem;">
                            <div class="my-5 mx-5">
                                <h3 style="color: black; text-align: center">Installment Quotation</h3><br /><br />
                                <form method="post" style="text-align: center; margin-left: 28%">
                              
                                    <div class="form-group col-6 mx-5">
                                        <label for="fname">Customer Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname"
                                        value= "<?php echo $r['fname'] ?>">
                                    </div>
                                
                                    <div class="form-group col-6 mx-5">
                                        <label for="amount">Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            placeholder="e.g. 15000/" onchange="Calculate()">
                                    </div>
                                    <div class="form-group col-6 mx-5">
                                        <label for="interest">Interest Rate</label>
                                        <input type="number" class="form-control" name="interest" id="interest"
                                            onchange="Calculate()" placeholder="e.g. 6.5">
                                    </div>

                                    <div class="form-group col-6 mx-5">
                                        <label for="months">Installment Plan (month)</label>
                                        <input type="number" class="form-control" id="months" name="months"
                                            onchange="Calculate()" placeholder="e.g. 12">
                                    </div>
                                    <br />
                                </form>
                                <div class="row my-5">
                                    <div class="col">
                                        <div class="col mx-3">
                                            <div class="row row-header my-3">
                                                <div class="col-12 col-sm-4">
                                                    <div class="card modal-body">
                                                        <a class="card-body">
                                                            <h5 class="card-title" id="total"></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="card modal-body">
                                                        <a class="card-body">
                                                            <h5 class="card-title" id="totalInterest"></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="card modal-body">
                                                        <a class="card-body">
                                                            <h5 class="card-title" id="totalPayment"></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
function Calculate() {

    const amount = document.querySelector("#amount").value;
    const interest = document.querySelector("#interest").value;
    const months = document.querySelector("#months").value;



    const rate = parseFloat(interest) / 12 / 100;

    const EMI = (amount * rate * Math.pow((1 + rate), months)) / (Math.pow((1 + rate), months) - 1);
    const totalInterest = (EMI * months) - amount;
    const totalPayment = totalInterest + parseFloat(amount);

    document.querySelector("#total")
        .innerHTML = "Monthly Installment : " + Math.round(EMI) + "($)";
    document.querySelector("#totalInterest")
        .innerHTML = "Total Interest : " + Math.round(totalInterest) + "(%)";
    document.querySelector("#totalPayment")
        .innerHTML = "Total Payment : " + Math.round(totalPayment) + "($)";
}


// Calculating interest per month
//   const total_interest = (amount * (interest * 0.01)) / months;
//   const total = ((amount / months) + total_interest).toFixed(2);

// document.querySelector("#total")
//     .innerHTML = "Monthly Installment : ($)" + total;
</script>


</html>