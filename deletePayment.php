<?php
    require("user_timestamp.php");

    require_once('database.php');
    $id = $_GET['id'];
    
    $res = $database->deletePayment($id);
    if($res){
        $_SESSION['status'] = "Payment Details Deleted succcessfully.";
        header('location: viewPayment.php');
    }else{
        $_SESSION['status'] = "Payment details not deleted.";
    }
?>
