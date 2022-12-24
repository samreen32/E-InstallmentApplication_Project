<?php
session_start();
    require_once('database.php');
    $id = $_GET['id'];
    
    $res = $database->deleteProduct($id);
    if($res){
        $_SESSION['status'] = "<h6>Product Deleted succcessfully.</h6>";
        header('location: viewProduct.php');
    }else{
        $_SESSION['status'] = "<h6>Product not deleted.</h6>";
    }
?>
