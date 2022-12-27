<?php
    require("user_timestamp.php");

    require_once('database.php');
    $id = $_GET['id'];
    
    $res = $database->deleteCustomer($id);
    if($res){
        $_SESSION['status'] = "Customer has been Deleted.";
        header('location: viewCustomer.php');
    }else{
        $_SESSION['status'] = "Customer not deleted.";
    }
?>
