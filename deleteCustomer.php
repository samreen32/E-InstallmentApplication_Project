<?php
    require("user_timestamp.php");

    require_once('database.php');
    $id = $_GET['id'];
    
    $res = $database->deleteCustomer($id);
    if($res){
        $_SESSION['status'] = "Customer Deleted succcessfully.";
        header('location: viewCustomer.php');
    }else{
        $_SESSION['status'] = "Customer not deleted.";
    }
?>
