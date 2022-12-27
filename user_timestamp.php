<?php
   session_start();


if(isset($_REQUEST['id'])){
    if((time() - $_SESSION['login_timestamp']) > 900){      
       echo "logout";
    }
}else{
    
    if(isset($_SESSION['login_timestamp'])){
        if((time() - $_SESSION['login_timestamp']) > 900){       //60*15=900sec
            header("location: logout.php");
            die();
        }
    }
    $_SESSION['login_timestamp'] = time(); 
    if(empty($_SESSION['userLoggedin']) || $_SESSION['userLoggedin'] == ''){
        header("Location: logout.php");
        die();
    }
}


?>