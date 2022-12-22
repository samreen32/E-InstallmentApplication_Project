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
                        <a type="button" style="color: white;" href="./Admin.php">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                        <a class="navbar-brand nav__logo mx-3 my-1" href="#">Add Customer Details</a>
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
    <div class="container"  style="background-color: #9575CD;" >
    <div class="container">
        <div style="margin-top: 100px;">
            <h1 style="text-align: center;"></h1>
        </div><br>
        <div>
            <form method="post">
                <h4 style="color: black; text-align: center">Customer Details</h4><br />
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="my-1 mr-2" for="title">Title</label>
                        <select class="form-control" id="title" name="title">
                            <option selected>Choose...</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="e.g. Samreen">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="e.g. Karim">
                    </div>
                </div>
                <div class="form-group mx-2">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Select Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                                        checked>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
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
                    <input type="text" class="form-control" name="address" id="address" placeholder="e.g. 1234 Main St">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="e.g. Islamabad">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <select id="state" class="form-control" name="state">
                            <option selected>Choose...</option>
                            <option>Pakistan</option>
                            <option>Turkey</option>
                            <option>Korea</option>
                            <option>Nepal</option>
                            <option>USA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="e.g. 8000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="my-1 mr-2" for="plan">Installment Plan</label>
                        <select class="form-control" id="plan" name="plan">
                            <option selected>Choose plan...</option>
                            <option value="1st">1st Installment</option>
                            <option value="2nd">2nd Installment</option>
                            <option value="3rd">3rd Installment</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="my-1 mr-2" for="plan">Product Detail</label>
                        <select class="form-control" id="plan" name="plan">
                            <option selected>Choose product...</option>
                            <option value="electric">Electric Product</option>
                            <option value="kitchen">Kitchen Product</option>
                            <option value="pet">Pet Products</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="textarea">Installment Details</label>
                    <textarea class="form-control" id="textarea" rows="3" placeholder="e.g. 1st Installment"
                        name="textarea"></textarea>
                </div>
                <input type="submit" class="button button--flex" value="Add Customer" />
            </form>
        </div><br>

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

</html>