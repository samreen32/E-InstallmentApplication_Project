<?php
 require_once('database.php');
 $id = $_GET['id'];
 $res = $database->read($id);
 $r = mysqli_fetch_assoc($res);
 if(isset($_POST) & !empty($_POST)){
	 $fname = $database->sanitize($_POST['fname']);
	 $email = $database->sanitize($_POST['email']);

 
	$res = $database->updateProfile($fname, $email, $id);
	if($res){
	 	echo "Successfully updated data";
		//header("location:view.php?msg="Successfully submited"");
	}else{
	 	echo "failed to update data";
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

    <style>
    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 165px;
        height: 165px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 165px;
        width: 165px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: "rgba(0, 0, 0, 0.8)";
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
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
                    <a class="navbar-brand nav__logo mx-5" href="#">Profile</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <span style="margin-left: 950px">
                            <a style="color: white;" href="logout.php"> <span class="fa fa-sign-in fa-lg img-fluid mx-2 button__icon"></span>Logout</a>

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
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" style="background-color: white;"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="col">
                <div class="card modal-body">
                    <div class="card-body">
                        <a type="button" class="button button--flex my-3" href="changePassword.php" 
                        style="height: 50px; width:100%;"><i
                                class="fa fa-key img-fluid mx-2 button__icon" aria-hidden="true"></i>Change Password</a>

                        <a type="button" class="button button--flex my-3" style="height: 50px; 
                                width:100%;"><i class="fa fa-eye img-fluid mx-2 button__icon" aria-hidden="true"></i>Add
                            Customer Details</a>
                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-pencil-square img-fluid mx-2 button__icon" aria-hidden="true"></i>Update
                            Installments</a>

                        <a type="button" class="button button--flex my-3" style="height: 50px; width:100%;"><i
                                class="fa fa-cogs img-fluid mx-2 button__icon" aria-hidden="true"></i>Settings</a>
                        <a type="button" class="button button--flex my-3" href="logout.php" 
                            style="height: 50px; width:100%;"><i
                                class="fa fa-sign-out img-fluid mx-2 button__icon" aria-hidden="true"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Body -->
    <div class="main" style="background-color: #9575CD;">
        <div class="row my-5">
            <div class="col" style="margin-top: 40px;">
                <div class="col mx-5">
                    <div class="row row-header my-3">
                        <div class="card modal-body" style="width: 55rem;">
                            <div class="my-4 mx-3">
                              <a type="button" href="Admin.php" style="color: black;">
                                <i class="fa fa-angle-left fa-4x img-fluid" aria-hidden="true"></i>
                              </a>
                              
                                <form method="post" style="text-align: center;">
                                    <div class="form-row my-5">

                                        <!--Profile Image -->
                                        <!-- <div class="profile-pic"> -->
                                           
                                                <!-- <label class="-label" for="profile_picture">
                                                    <span class="glyphicon glyphicon-camera"></span>
                                                    <span>Change Image</span>
                                                </label>
                                                <input class="form-control" type="file" id="profile_picture" 
                                                    name="profile_picture"> -->
                                                <!-- <img src="https://pic.onlinewebfonts.com/svg/img_569204.png"
                                                    width="100" />  -->

                                            <!-- <input id="file" type="file" 
                                                onchange="loadFile(event)" name="file" />
                                            <img src="https://pic.onlinewebfonts.com/svg/img_569204.png"
                                            id="output" width="100" /> -->
                                            <!-- -->
                                        <!-- </div> -->


                                        <!--Form Adding -->
                                    
                                        <!-- // if($profile_picture == NULL){
                                        //     echo '<img src="https://pic.onlinewebfonts.com/svg/img_569204.png"
                                        //     width="10"/>';
                                        // }
                                        // else{
                                        //     echo '<img src="upload/'.$profile_picture.'"/>';
                                        // } -->
                                    
                                        <!-- <div class="form-group col-md-5" style="margin: auto">
                                            <label for="profile_picture" class="form-label" style="color: black">Choose</label>
                                            <input  class="form-control" type="file" id="profile_picture" name="profile_picture">
                                        </div> -->
                                        <div class="form-group col-md-5" style="margin: auto">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname"
                                            value="<?php echo $r['fname'] ?>" />
                                        </div>
                                        
                                        <div class="form-group col-md-5 my-3" style="margin: auto">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                            value="<?php echo $r['email'] ?>" aria-describedby="emailHelp"/>
                                        </div>
                                        
                                        <input type="submit" class="button button--flex mx-3 my-3" 
                                            style="background-color: #512da8; color: #fff; height: 40px; text-align: center;
                                            padding: 0.4rem 1.75rem; border-radius: 0.5rem; transition: 0.3s;"
                                            value="Update Profile"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card mx-3 modal-body" style="width: 15rem;">
                            <div class="card-body my-3">
                                <h5 class="card-title">Your About
                                    <i class="fa fa-quote-left fa-3x fa-pull-left fa-border button__icon" aria-hidden="true"></i>
                                </h5>
                                <p class="card-text"><i id='changeText'>Just there to make people life easier
                                        by providing them installment.</i>
                                </p>
                            </div>
                            <div class="card-body" style="text-align: center; margin-top: -250px;">
                                <div class="card-text">
                                    <label for="changeAbout" class="form-label">
                                        <h5>Change my about</h5>
                                    </label>
                                    <input type="text" id="changeAbout" class="form-control"
                                        aria-describedby="emailHelp">
                                    <a type="button" class="button button--flex mx-3 my-3" 
                                    id='btn'>Update About</a>
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


</html>

