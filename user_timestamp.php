<?php
   session_start();
    
    if(isset($_SESSION['login_timestamp'])){
        if((time() - $_SESSION['login_timestamp']) > 10){       //10sec
            header("location: logout.php");
            die();
        }
    }
    $_SESSION['login_timestamp'] = time(); 
    if(empty($_SESSION['userLoggedin']) || $_SESSION['userLoggedin'] == ''){
        header("Location: logout.php");
        die();
    }


?>